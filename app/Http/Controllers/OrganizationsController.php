<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $organizations = Organization::all();
        redirect('/home')->with('organizations', $organizations); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizations/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        // Create new organziation
        $organization = new Organization;
        $organization->name = $request->input('name');
        $organization->founded_at = Carbon::now();
        $organization->save();

        return redirect('/home')->with('success', 'Organization created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::find($id);
        $allUsers = Organization::find($id)->users;
        $activeUsers = Organization::find($id)->users->where('status','ACTIVE');
        $inactiveUsers = Organization::find($id)->users->where('status','INACTIVE');
        $mostRecentInactiveUser = Organization::find($id)->users->where('status','INACTIVE')->take(1);

        $data = [
            'organization' => $organization,
            'allUsers' => $allUsers,
            'activeUsers' => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
            'mostRecentInactiveUser' => $mostRecentInactiveUser,
        ];

        return view('organizations/detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::find($id);
        return view('organizations/edit')->with('organization', $organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('type') == 'DEACTIVATE') {
            $tempPreviousMonth = Carbon::now()->subMonth();
            $previous2Months = $tempPreviousMonth->subMonth();
            $previousMonth = Carbon::now()->subMonth();
            $activeUserIDs =User::select('id')->where('organization_id', 4)->where('status','ACTIVE')->whereBetween('created_at', [$previous2Months, $previousMonth])->pluck('id');
            User::whereIn('id', $activeUserIDs)->update(array('status' => 'INACTIVE'));
        } else {
            $this->validate($request, [
                'name' => 'required'
            ]);

            // Create new organziation
            $organization = Organization::find($id);
            $organization->name = $request->input('name');
            $organization->updated_at = Carbon::now(); // assign users in the system
            $organization->save();

            return redirect('/organizations')->with('success', 'Organization updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //return $id;
        // delete users
        $type = $request->input('type');    // get the type of delete from the input
        // make user inactive
        if($type == 'ACTIVE') {
            //$deleteUser = User::find($id)->delete();  // hard delete
            User::where('id', $id)->update(array('status' => 'INACTIVE'));  // soft delete
        } else {
            $inactiveUserIDs = User::select('id')->where('organization_id', $id)->where('status','INACTIVE')->pluck('id');
            User::whereIn('id', $inactiveUserIDs)->delete();
        }

        return redirect('home')->with('success', 'User deleted!');
    }

    // populate user select dropdown
    public function selectUsersDropdown() {

        $users = User::where('role', 'USER')->pluck('email', 'id');

        return view('organizations/create',compact('users'));

    }
}
