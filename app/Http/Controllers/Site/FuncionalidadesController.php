<?php

namespace CentralCondo\Http\Controllers\Site;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuncionalidadesController extends Controller
{

    public function index()
    {
        return view('site.funcionalidades');
    }
}
