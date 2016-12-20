<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\UserCommunicationCreateRequest;
use CentralCondo\Http\Requests\UserCommunicationUpdateRequest;
use CentralCondo\Repositories\UserCommunicationRepository;
use CentralCondo\Validators\UserCommunicationValidator;


class UserCommunicationsController extends Controller
{

    /**
     * @var UserCommunicationRepository
     */
    protected $repository;

    /**
     * @var UserCommunicationValidator
     */
    protected $validator;

    public function __construct(UserCommunicationRepository $repository, UserCommunicationValidator $validator)
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
        $userCommunications = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userCommunications,
            ]);
        }

        return view('userCommunications.index', compact('userCommunications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCommunicationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserCommunicationCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userCommunication = $this->repository->create($request->all());

            $response = [
                'message' => 'UserCommunication created.',
                'data'    => $userCommunication->toArray(),
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
        $userCommunication = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userCommunication,
            ]);
        }

        return view('userCommunications.show', compact('userCommunication'));
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

        $userCommunication = $this->repository->find($id);

        return view('userCommunications.edit', compact('userCommunication'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserCommunicationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserCommunicationUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userCommunication = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'UserCommunication updated.',
                'data'    => $userCommunication->toArray(),
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
                'message' => 'UserCommunication deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserCommunication deleted.');
    }
}
