<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Diary;

use Carbon\Carbon;
use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Condominium\Diary\DiaryRequest;
use CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository;
use CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepository;
use CentralCondo\Services\Portal\Condominium\Diary\DiaryService;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class DiaryController extends Controller
{

    /**
     * @var DiaryRepository
     */
    protected $repository;

    /**
     * @var ReserveAreaRepository
     */
    protected $reserveAreaRepository;

    /**
     * @var DiaryService
     */
    protected $service;

    /**
     * DiaryController constructor.
     * @param DiaryRepository $repository
     * @param ReserveAreaRepository $reserveAreaRepository
     * @param DiaryService $service
     */
    public function __construct(DiaryRepository $repository,
                                ReserveAreaRepository $reserveAreaRepository,
                                DiaryService $service)
    {
        $this->repository = $repository;
        $this->reserveAreaRepository = $reserveAreaRepository;
        $this->service = $service;
    }

    public function index()
    {
        $config['title'] = trans('Agenda');
        $config['page'] = 'diary';
        $config['activeMenu'] = 'condominium';
        $config['activeMenuN2'] = 'diary';

        $reserveAreas = $this->reserveAreaRepository->getAllCondominiumActive();

        return view('portal.condominium.diary.index', compact('config', 'reserveAreas'));
    }

    public function all()
    {
        $dados = $this->repository->getAllCondominium();

        foreach ($dados as $key => $row) {
            $date = $row['date'] . ' ' . $row['start_date'];
            $dados[$key]['date'] = Carbon::parse($date)->toDateString();
        }

        if (request()->wantsJson()) {
            return response()->json([
                'event' => $dados,
            ]);
        }
    }

    public function edit($id)
    {
        $dados = $this->repository->getDiary($id);
        $reserveAreas = $this->reserveAreaRepository->getAllCondominiumActive();
        $dados['date'] = date('d/m/Y', strtotime($dados->date));

        if ($dados->user_condominium_id == session()->get('user_condominium_id') || session()->get('admin') == 'y') {
            return view('portal.condominium.diary.modals.edit', compact('dados', 'reserveAreas'));
        } else {
            return view('portal.condominium.diary.modals.show', compact('dados', 'reserveAreas'));
        }
    }

    public function store(DiaryRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function update(DiaryRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
