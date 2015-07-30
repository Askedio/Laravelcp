<?php

namespace Askedio\Laravelcp\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Askedio\Laravelcp\Models\Role;

class HomeController extends Controller
{
    public function index()
    {
		    //dd('Hello World, index :D');


$adminRole = Role::create([
    'name' => 'Admin',
    'slug' => 'admin',
    'description' => '', // optional
    'parent_id' => NULL, // optional, set to NULL by default
]);


        return view('lcp::welcome');
    }

    public function create()
    {
		    dd('Hello World, create :D');
    }

    public function store()
    {
		    dd('Hello World, store :D');
    }

    public function show()
    {
		    dd('Hello World, show :D');
    }

    public function edit()
    {
		    dd('Hello World, edit :D');
    }

    public function update()
    {
		    dd('Hello World, update :D');
    }

    public function destroy()
    {
		    dd('Hello World, destroy :D');
    }
}
