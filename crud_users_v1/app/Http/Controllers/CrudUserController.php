<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    /*
     *login page
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Registration page
     */
    public function registration()
    {
        return view('auth.registration');
    }
    /**
    *Delete User
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }
    // Signout
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        // Redirect to login page
        return redirect('login');
    }
}
