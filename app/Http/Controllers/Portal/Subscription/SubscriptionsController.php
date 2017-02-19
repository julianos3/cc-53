<?php

namespace CentralCondo\Http\Controllers\Portal\Subscription;

use CentralCondo\Http\Controllers\Controller;

class SubscriptionsController extends Controller
{


    public function index()
    {
        $config['title'] = 'Home';
        $config['activeMenu'] = 'home';

        return view('portal.subscription.index', compact('config'));
    }

}
