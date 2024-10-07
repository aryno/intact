<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    /**
     * The Homepage
     */
    public function index()
    {
        return view('web.home.index');
    }

    public function about()
    {
        return view('web.home.about');
    }
}
