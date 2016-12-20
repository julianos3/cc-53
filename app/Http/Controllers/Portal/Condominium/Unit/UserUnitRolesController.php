<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Unit;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\UserUnitRoleCreateRequest;
use CentralCondo\Http\Requests\UserUnitRoleUpdateRequest;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRoleRepository;
use CentralCondo\Validators\Portal\Condominium\Unit\UserUnitRoleValidator;


class UserUnitRolesController extends Controller
{

    /**
     * @var UserUnitRoleRepository
     */
    protected $repository;

    /**
     * @var UserUnitRoleValidator
     */
    protected $validator;

    public function __construct(UserUnitRoleRepository $repository, UserUnitRoleValidator $validator)
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
        $userUnitRoles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userUnitRoles,
            ]);
        }

        return view('userUnitRoles.index', compact('userUnitRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserUnitRoleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserUnitRoleCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userUnitRole = $this->repository->create($request->all());

            $response = [
                'message' => 'UserUnitRole created.',
                'data'    => $userUnitRole->toArray(),
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
        $userUnitRole = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userUnitRole,
            ]);
        }

        return view('userUnitRoles.show', compact('userUnitRole'));
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

        $userUnitRole = $this->repository->find($id);

        return view('userUnitRoles.edit', compact('userUnitRole'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserUnitRoleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserUnitRoleUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userUnitRole = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'UserUnitRole updated.',
                'data'    => $userUnitRole->toArray(),
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
                'message' => 'UserUnitRole deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserUnitRole deleted.');
    }
}
