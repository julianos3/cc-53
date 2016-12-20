<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Unit;

use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\UnitTypeCreateRequest;
use CentralCondo\Http\Requests\UnitTypeUpdateRequest;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepository;
use CentralCondo\Validators\Portal\Condominium\Unit\UnitTypeValidator;


class UnitTypesController extends Controller
{

    /**
     * @var UnitTypeRepository
     */
    protected $repository;

    /**
     * @var UnitTypeValidator
     */
    protected $validator;

    public function __construct(UnitTypeRepository $repository, UnitTypeValidator $validator)
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
        $unitTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $unitTypes,
            ]);
        }

        return view('unitTypes.index', compact('unitTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UnitTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UnitTypeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $unitType = $this->repository->create($request->all());

            $response = [
                'message' => 'UnitType created.',
                'data'    => $unitType->toArray(),
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
        $unitType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $unitType,
            ]);
        }

        return view('unitTypes.show', compact('unitType'));
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

        $unitType = $this->repository->find($id);

        return view('unitTypes.edit', compact('unitType'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UnitTypeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UnitTypeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $unitType = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'UnitType updated.',
                'data'    => $unitType->toArray(),
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
                'message' => 'UnitType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UnitType deleted.');
    }
}
