<?php

namespace CentralCondo\Http\Controllers\Portal;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\StateRequest;
use CentralCondo\Repositories\Portal\StateRepository;
use CentralCondo\Validators\Portal\StateValidator;
use Illuminate\Support\Facades\Response;


class StateController extends Controller
{

    /**
     * @var StateRepository
     */
    protected $repository;

    public function __construct(StateRepository $repository, StateValidator $validator)
    {
        $this->repository = $repository;
    }

    public function getUfId($uf)
    {
        $dados = $this->repository->findWhere([
            'uf' => $uf
        ]);

        return Response::json($dados);
    }
}
