<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user(); // get the authenticated user object
        if ($user->role == 'ADMIN') {
            $organizations = Organization::all(); // get all organizations
            //$usersCount = Organization::find()->users->where('status','ACTIVE')->count();

            $data = [
                'organizations' => $organizations,
                'userRole' => $user->role
            ];

            // diplay only this users' associated organization
            return view('home')->with('data', $data);
        } else{
            $organizations = Organization::where('user_status', 'ACTIVE')->where('user_id', $user->id)->first(); // get 1 organization with the associated user id

            $data = [
                'organizations' => $organizations,
                'userRole' => $user->role
            ];

            // diplay only this users' associated organization
            return view('home')->with('data', $data);
        }
    }
}
