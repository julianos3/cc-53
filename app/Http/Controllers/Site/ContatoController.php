<?php

namespace CentralCondo\Http\Controllers\Site;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function index()
    {
        return view('site.contato');
    }
}
