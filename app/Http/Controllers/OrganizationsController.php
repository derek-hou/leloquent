<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        return view('home')->with('organizations', $organizations); */
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
        $activeUsers = Organization::find($id)->users->where('status','ACTIVE');
        $inactiveUsers = Organization::find($id)->users->where('status','INACTIVE')->take(1);
        //return $inactiveUsers = DB::table('organizations')->find($id)->where('status','INACTIVE')->orderBy('created_at','desc')->get();

        $data = [
            'organization' => $organization->users,
            'activeUsers' => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        // Create new organziation
        $organization = Organization::find($id);
        $organization->name = $request->input('name');
        $organization->updated_at = Carbon\Carbon::now(); // assign users in the system
        $organization->save();

        return redirect('/organizations')->with('success', 'Organization updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Create new organziation
        $organization = Organization::find($id);
        $organization->delete();

        return redirect('/organizations')->with('success', 'Organization deleted!');
    }

    // populate user select dropdown
    public function selectUsersDropdown() {

        $users = User::where('role', 'USER')->pluck('email', 'id');

        return view('organizations/create',compact('users'));

    }
}
