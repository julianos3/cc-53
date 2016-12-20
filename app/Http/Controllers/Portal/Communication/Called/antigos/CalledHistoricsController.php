<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\CalledHistoricCreateRequest;
use CentralCondo\Http\Requests\CalledHistoricUpdateRequest;
use CentralCondo\Repositories\CalledHistoricRepository;
use CentralCondo\Validators\CalledHistoricValidator;


class CalledHistoricsController extends Controller
{

    /**
     * @var CalledHistoricRepository
     */
    protected $repository;

    /**
     * @var CalledHistoricValidator
     */
    protected $validator;

    public function __construct(CalledHistoricRepository $repository, CalledHistoricValidator $validator)
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
        $calledHistorics = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calledHistorics,
            ]);
        }

        return view('calledHistorics.index', compact('calledHistorics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CalledHistoricCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CalledHistoricCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $calledHistoric = $this->repository->create($request->all());

            $response = [
                'message' => 'CalledHistoric created.',
                'data'    => $calledHistoric->toArray(),
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
        $calledHistoric = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calledHistoric,
            ]);
        }

        return view('calledHistorics.show', compact('calledHistoric'));
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

        $calledHistoric = $this->repository->find($id);

        return view('calledHistorics.edit', compact('calledHistoric'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CalledHistoricUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CalledHistoricUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $calledHistoric = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'CalledHistoric updated.',
                'data'    => $calledHistoric->toArray(),
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
                'message' => 'CalledHistoric deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CalledHistoric deleted.');
    }
}
