<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\PeriodicityCreateRequest;
use CentralCondo\Http\Requests\PeriodicityUpdateRequest;
use CentralCondo\Repositories\PeriodicityRepository;
use CentralCondo\Validators\PeriodicityValidator;


class PeriodicityController extends Controller
{

    /**
     * @var PeriodicityRepository
     */
    protected $repository;

    /**
     * @var PeriodicityValidator
     */
    protected $validator;

    public function __construct(PeriodicityRepository $repository, PeriodicityValidator $validator)
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
        $periodicities = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $periodicities,
            ]);
        }

        return view('periodicities.index', compact('periodicities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PeriodicityCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodicityCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $periodicity = $this->repository->create($request->all());

            $response = [
                'message' => 'Periodicity created.',
                'data'    => $periodicity->toArray(),
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
        $periodicity = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $periodicity,
            ]);
        }

        return view('periodicities.show', compact('periodicity'));
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

        $periodicity = $this->repository->find($id);

        return view('periodicities.edit', compact('periodicity'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PeriodicityUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PeriodicityUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $periodicity = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Periodicity updated.',
                'data'    => $periodicity->toArray(),
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
                'message' => 'Periodicity deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Periodicity deleted.');
    }
}
