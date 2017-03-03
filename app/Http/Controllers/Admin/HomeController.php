<?php

namespace CentralCondo\Http\Controllers\Admin;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::guard('admin_user')->user()->name);
        $config['title'] = "Home";
        $config['activeMenu'] = 'home';
        return view('admin.home.index', compact('config'));
    }
}
