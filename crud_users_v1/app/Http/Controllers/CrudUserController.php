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

    // Signout
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        // Redirect to login page
        return redirect('login');
    }
}
