<?php

namespace CentralCondo\Services\Portal\Condominium\Subscriptions;


use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use Illuminate\Support\Facades\Request;

class StripeService
{
    protected $condominiumRepository;

    public function __construct(CondominiumRepository $condominiumRepository)
    {
        $this->condominiumRepository = $condominiumRepository;
    }

    public function send($condominumId, $creditCardToken)
    {
        $condominium = $this->condominiumRepository->find($condominumId);
        $condominium->newSubscription('condominio 02', 'plan2')->create($creditCardToken, [
            'email' => 'juliano@agencias3.com.br',
            'metadata' => [
                'First Name' => 'Juliano',
                'Last Name' => 'god'
            ]
        ]);

        return $condominium;
    }

    public function testeSend(Request $request)
    {
        $data = $request->all();
        $creditCardToken = $data['stripeToken'];

        $user = User::find(1);
        $user->newSubscription('condominio 02', 'plan2')->create($creditCardToken, [
            'email' => 'juliano@agencias3.com.br',
            'metadata' => [
                'First Name' => 'Juliano',
                'Last Name' => 'god'
            ]
        ]);

    }

    public function cancelStripe()
    {

        $user = User::find(1);
        $user->subscription('condominio 02')->cancelNow();
        //faz pelo name salva no banco
        //ideia: utilizar o stripe_id
    }

    public function resumeStripe()
    {
        $user = User::find(1);
        $user->subscription('condominio 02')->resume();
    }

}