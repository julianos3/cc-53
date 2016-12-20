<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Finality;

use CentralCondo\Entities\Portal\Condominium\Finality\Finality;
use CentralCondo\Http\Controllers\Controller;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\FinalityCreateRequest;
use CentralCondo\Http\Requests\FinalityUpdateRequest;
use CentralCondo\Repositories\Portal\Condominium\Finality\FinalityRepository;
use CentralCondo\Validators\Portal\Condominium\Finality\FinalityValidator;


class FinalitiesController extends Controller
{

    /**
     * @var FinalityRepository
     */
    protected $repository;

    /**
     * @var FinalityValidator
     */
    protected $validator;

    public function __construct(FinalityRepository $repository, FinalityValidator $validator)
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
        $finalities = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $finalities,
            ]);
        }

        return view('finalities.index', compact('finalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FinalityCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FinalityCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $finality = $this->repository->create($request->all());

            $response = [
                'message' => 'Finality created.',
                'data'    => $finality->toArray(),
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
        $finality = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $finality,
            ]);
        }

        return view('finalities.show', compact('finality'));
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

        $finality = $this->repository->find($id);

        return view('finalities.edit', compact('finality'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FinalityUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(FinalityUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $finality = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Finality updated.',
                'data'    => $finality->toArray(),
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
                'message' => 'Finality deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Finality deleted.');
    }
}
