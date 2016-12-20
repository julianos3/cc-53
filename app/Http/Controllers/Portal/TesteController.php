<?php

namespace CentralCondo\Http\Controllers\Portal;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests;
use CentralCondo\Repositories\Portal\CityRepository;
use Illuminate\Support\Facades\Response;

class TesteController extends Controller
{

    public function index()
    {

        return view('portal.vendor.emails.wellcome-new-user');
    }

}
