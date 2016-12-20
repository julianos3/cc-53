<?php

namespace CentralCondo\Http\Controllers\Portal\User;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\Portal\User\UserRoleRequest;
use CentralCondo\Repositories\Portal\User\UserRoleRepository;
use CentralCondo\Validators\Portal\User\UserRoleValidator;

class UserRolesController extends Controller
{

    /**
     * @var UserRoleRepository
     */
    protected $repository;

    /**
     * @var UserRoleValidator
     */
    protected $validator;

    public function __construct(UserRoleRepository $repository, UserRoleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $userRoles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userRoles,
            ]);
        }

        return view('userRoles.index', compact('userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRoleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRoleCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userRole = $this->repository->create($request->all());

            $response = [
                'message' => 'UserRole created.',
                'data' => $userRole->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
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
        $userRole = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userRole,
            ]);
        }

        return view('userRoles.show', compact('userRole'));
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

        $userRole = $this->repository->find($id);

        return view('userRoles.edit', compact('userRole'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserRoleUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(UserRoleUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userRole = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'UserRole updated.',
                'data' => $userRole->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
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
                'message' => 'UserRole deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserRole deleted.');
    }

}