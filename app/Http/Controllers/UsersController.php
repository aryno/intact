<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * The user's dashboard
     */
    public function dashboard()
    {
        return view('web.users.dashboard');
    }
}
