<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Diary;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\DiaryCreateRequest;
use CentralCondo\Http\Requests\DiaryUpdateRequest;


class DiaryController extends Controller
{

    /**
     * @var DiaryRepository
     */
    protected $repository;

    public function __construct(DiaryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $config['title'] = trans('Agenda');
        $config['page'] = 'diary';
        //$config['js'] = 'diary';

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $dados = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dados,
            ]);
        }

        return view('portal.condominium.diary.index', compact('config', 'dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DiaryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DiaryCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $diary = $this->repository->create($request->all());

            $response = [
                'message' => 'Diary created.',
                'data'    => $diary->toArray(),
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
        $diary = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $diary,
            ]);
        }

        return view('diaries.show', compact('diary'));
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

        $diary = $this->repository->find($id);

        return view('diaries.edit', compact('diary'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DiaryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(DiaryUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $diary = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Diary updated.',
                'data'    => $diary->toArray(),
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
                'message' => 'Diary deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Diary deleted.');
    }
}
