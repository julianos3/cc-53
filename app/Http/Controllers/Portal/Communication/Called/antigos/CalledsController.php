<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\CalledCreateRequest;
use CentralCondo\Http\Requests\CalledUpdateRequest;
use CentralCondo\Repositories\CalledRepository;
use CentralCondo\Validators\CalledValidator;


class CalledsController extends Controller
{

    /**
     * @var CalledRepository
     */
    protected $repository;

    /**
     * @var CalledValidator
     */
    protected $validator;

    public function __construct(CalledRepository $repository, CalledValidator $validator)
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
        $calleds = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calleds,
            ]);
        }

        return view('calleds.index', compact('calleds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CalledCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CalledCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $called = $this->repository->create($request->all());

            $response = [
                'message' => 'Called created.',
                'data'    => $called->toArray(),
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
        $called = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $called,
            ]);
        }

        return view('calleds.show', compact('called'));
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

        $called = $this->repository->find($id);

        return view('calleds.edit', compact('called'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CalledUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CalledUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $called = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Called updated.',
                'data'    => $called->toArray(),
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
                'message' => 'Called deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Called deleted.');
    }
}
