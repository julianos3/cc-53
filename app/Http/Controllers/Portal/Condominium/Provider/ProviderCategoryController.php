<?php

namespace CentralCondo\Http\Controllers;

use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepository;
use CentralCondo\Validators\Portal\Condominium\Provider\ProviderCategoryValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class ProviderCategoryController extends Controller
{

    /**
     * @var ProviderCategoryRepository
     */
    protected $repository;

    /**
     * @var ProviderCategoryValidator
     */
    protected $validator;

    public function __construct(ProviderCategoryRepository $repository, ProviderCategoryValidator $validator)
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
        $providerCategories = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $providerCategories,
            ]);
        }

        return view('providerCategories.index', compact('providerCategories'));
    }

    /**
     * @param ProviderCategoryCreateRequest $request
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(ProviderCategoryCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $providerCategory = $this->repository->create($request->all());

            $response = [
                'message' => 'ProviderCategory created.',
                'data' => $providerCategory->toArray(),
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
        $providerCategory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $providerCategory,
            ]);
        }

        return view('providerCategories.show', compact('providerCategory'));
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

        $providerCategory = $this->repository->find($id);

        return view('providerCategories.edit', compact('providerCategory'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProviderCategoryUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(ProviderCategoryUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $providerCategory = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'ProviderCategory updated.',
                'data' => $providerCategory->toArray(),
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
                'message' => 'ProviderCategory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProviderCategory deleted.');
    }
}
