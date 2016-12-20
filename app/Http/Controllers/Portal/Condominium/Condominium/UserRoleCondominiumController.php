<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Condominium;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\UserRoleCondominiumCreateRequest;
use CentralCondo\Http\Requests\UserRoleCondominiumUpdateRequest;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserRoleCondominiumRepository;
use CentralCondo\Validators\Portal\Condominium\Condominium\UserRoleCondominiumValidator;

class UserRoleCondominiumController extends Controller
{

    /**
     * @var UserRoleCondominiumRepository
     */
    protected $repository;

    /**
     * @var UserRoleCondominiumValidator
     */
    protected $validator;

    public function __construct(UserRoleCondominiumRepository $repository, UserRoleCondominiumValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $userRoleCondominia = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userRoleCondominia,
            ]);
        }

        return view('userRoleCondominia.index', compact('userRoleCondominia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRoleCondominiumCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRoleCondominiumCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userRoleCondominium = $this->repository->create($request->all());

            $response = [
                'message' => 'UserRoleCondominium created.',
                'data'    => $userRoleCondominium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userRoleCondominium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userRoleCondominium,
            ]);
        }

        return view('userRoleCondominia.show', compact('userRoleCondominium'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $userRoleCondominium = $this->repository->find($id);

        return view('userRoleCondominia.edit', compact('userRoleCondominium'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserRoleCondominiumUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserRoleCondominiumUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userRoleCondominium = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'UserRoleCondominium updated.',
                'data'    => $userRoleCondominium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UserRoleCondominium deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserRoleCondominium deleted.');
    }
}
