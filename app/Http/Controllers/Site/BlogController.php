<?php

namespace CentralCondo\Http\Controllers\Site;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return view('site.blog');
    }
}