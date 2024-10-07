<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('web.app.index');
    }
}
