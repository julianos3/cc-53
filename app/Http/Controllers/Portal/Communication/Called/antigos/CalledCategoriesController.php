<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\CalledCategoryCreateRequest;
use CentralCondo\Http\Requests\CalledCategoryUpdateRequest;
use CentralCondo\Repositories\CalledCategoryRepository;
use CentralCondo\Validators\CalledCategoryValidator;


class CalledCategoriesController extends Controller
{

    /**
     * @var CalledCategoryRepository
     */
    protected $repository;

    /**
     * @var CalledCategoryValidator
     */
    protected $validator;

    public function __construct(CalledCategoryRepository $repository, CalledCategoryValidator $validator)
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
        $calledCategories = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calledCategories,
            ]);
        }

        return view('calledCategories.index', compact('calledCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CalledCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CalledCategoryCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $calledCategory = $this->repository->create($request->all());

            $response = [
                'message' => 'CalledCategory created.',
                'data'    => $calledCategory->toArray(),
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
        $calledCategory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calledCategory,
            ]);
        }

        return view('calledCategories.show', compact('calledCategory'));
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

        $calledCategory = $this->repository->find($id);

        return view('calledCategories.edit', compact('calledCategory'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CalledCategoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CalledCategoryUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $calledCategory = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'CalledCategory updated.',
                'data'    => $calledCategory->toArray(),
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
                'message' => 'CalledCategory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CalledCategory deleted.');
    }
}
