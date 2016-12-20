<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\CommunicationCreateRequest;
use CentralCondo\Http\Requests\CommunicationUpdateRequest;
use CentralCondo\Repositories\CommunicationRepository;
use CentralCondo\Validators\CommunicationValidator;


class CommunicationsController extends Controller
{

    /**
     * @var CommunicationRepository
     */
    protected $repository;

    /**
     * @var CommunicationValidator
     */
    protected $validator;

    public function __construct(CommunicationRepository $repository, CommunicationValidator $validator)
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
        $communications = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $communications,
            ]);
        }

        return view('communications.index', compact('communications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommunicationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CommunicationCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $communication = $this->repository->create($request->all());

            $response = [
                'message' => 'Communication created.',
                'data'    => $communication->toArray(),
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
        $communication = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $communication,
            ]);
        }

        return view('communications.show', compact('communication'));
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

        $communication = $this->repository->find($id);

        return view('communications.edit', compact('communication'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CommunicationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CommunicationUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $communication = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Communication updated.',
                'data'    => $communication->toArray(),
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
                'message' => 'Communication deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Communication deleted.');
    }
}
