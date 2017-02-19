<?php

namespace CentralCondo\Http\Middleware;

use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use Closure;

class CheckSubscription
{
    protected $condominiumRepositoy;

    public function __construct(CondominiumRepository $condominiumRepository)
    {
        $this->condominiumRepositoy = $condominiumRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $condominium = $this->condominiumRepositoy->find(session()->get('condominium_id'));
        if(session()->get('subscription_id')) {
            if ($request->user()->condominium() && !$condominium->subscribed(session()->get('subscription_name'))) {
                if (session()->get('admin') == 'y') {
                    return redirect(route('portal.condominium.subscriptions.index'));
                } else {
                    return redirect(route('portal.home.index'));
                }
            }
        }elseif(!$condominium->onGenericTrial()){
            if (session()->get('admin') == 'y') {
                return redirect(route('portal.condominium.subscriptions.index'));
            } else {
                return redirect(route('portal.home.index'));
            }
        }

        return $next($request);
    }
}
