<?php

namespace Askedio\Laravelcp\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Askedio\Laravelcp\Models\Role;
use Askedio\Laravelcp\Http\Controllers\Controller;
use Askedio\Laravelcp\Helpers\SearchHelper;

class HomeController extends Controller
{
    public function index()
    {
        return view('lcp::dashboard');
    }


    public function show($page, \Request $request)
      
    {
      if($page == 'search'){
         return \Response::json(SearchHelper::Query(\Input::get('q')));
      }
    }
}