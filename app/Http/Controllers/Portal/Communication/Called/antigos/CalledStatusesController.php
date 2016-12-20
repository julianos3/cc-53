<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\CalledStatusCreateRequest;
use CentralCondo\Http\Requests\CalledStatusUpdateRequest;
use CentralCondo\Repositories\CalledStatusRepository;
use CentralCondo\Validators\CalledStatusValidator;


class CalledStatusesController extends Controller
{

    /**
     * @var CalledStatusRepository
     */
    protected $repository;

    /**
     * @var CalledStatusValidator
     */
    protected $validator;

    public function __construct(CalledStatusRepository $repository, CalledStatusValidator $validator)
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
        $calledStatuses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calledStatuses,
            ]);
        }

        return view('calledStatuses.index', compact('calledStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CalledStatusCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CalledStatusCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $calledStatus = $this->repository->create($request->all());

            $response = [
                'message' => 'CalledStatus created.',
                'data'    => $calledStatus->toArray(),
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
        $calledStatus = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calledStatus,
            ]);
        }

        return view('calledStatuses.show', compact('calledStatus'));
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

        $calledStatus = $this->repository->find($id);

        return view('calledStatuses.edit', compact('calledStatus'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CalledStatusUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CalledStatusUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $calledStatus = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'CalledStatus updated.',
                'data'    => $calledStatus->toArray(),
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
                'message' => 'CalledStatus deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CalledStatus deleted.');
    }
}
