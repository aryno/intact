<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('web.app.index');
    }

    public function create()
    {
        return view('web.app.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'app_name' => 'bail|required|string|max:50',
            'app_url' => 'bail|required|url|unique:apps,url|max:200',
            'app_info' => 'bail|required|string|max:255'
        ]);

        auth()->user()->apps()->create([
            'name' => $fields['app_name'],
            'url' => $fields['app_url'],
            'description' => $fields['app_info'],
            'client_id' => Str::random(8),
            'client_secret' => Str::uuid(),
        ]);

        return redirect()->back()->with(['status' => 'App created successfully!']);

    }

    /**
     * List all user's apps
     */
    public function list()
    {
        $apps = auth()->user()->apps()->get();

        return view('web.app.list', compact('apps'));
    }
}
