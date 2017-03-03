<?php

namespace CentralCondo\Http\Controllers\Site;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Site\NewslettersRequest;
use CentralCondo\Repositories\Site\NewsletterRepository;
use CentralCondo\Validators\Site\NewsletterValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class NewslettersController extends Controller
{

    /**
     * @var NewsletterRepository
     */
    protected $repository;

    /**
     * @var NewsletterValidator
     */
    protected $validator;

    public function __construct(NewsletterRepository $repository, NewsletterValidator $validator)
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
        $newsletters = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $newsletters,
            ]);
        }

        return view('newsletters.index', compact('newsletters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsletterCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NewslettersRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $newsletter = $this->repository->create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'E-mail cadastrado com sucesso!',
                'data' => $newsletter->toArray(),
            ]);

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
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
        $newsletter = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $newsletter,
            ]);
        }

        return view('newsletters.show', compact('newsletter'));
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

        $newsletter = $this->repository->find($id);

        return view('newsletters.edit', compact('newsletter'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  NewsletterUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(NewsletterUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $newsletter = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Newsletter updated.',
                'data' => $newsletter->toArray(),
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
                'message' => 'Newsletter deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Newsletter deleted.');
    }
}
