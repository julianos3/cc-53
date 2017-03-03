<?php

namespace CentralCondo\Services\Portal\Condominium\Diary;

use Carbon\Carbon;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository;
use CentralCondo\Services\Portal\Communication\Notification\NotificationService;
use CentralCondo\Validators\Portal\Condominium\Diary\DiaryValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class DiaryService
{

    protected $repository;

    protected $validator;

    protected $userCondominiumRepository;

    protected $notificationService;

    public function __construct(DiaryRepository $repository,
                                DiaryValidator $validator,
                                UserCondominiumRepository $userCondominiumRepository,
                                NotificationService $notificationService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->notificationService = $notificationService;
    }

    public function create(array $data)
    {
        $data['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date'])));
        $data['start_time'] = $data['start_time'] . ':00';
        $data['end_time'] = $data['end_time'] . ':00';

        if ($data['date'] < Carbon::now()) {
            $error = true;
            $messageError = 'A escolhida não pode ser anterior a data atual.';
        } else if (strtotime($data['end_time']) <= strtotime($data['start_time'])) {
            $error = true;
            $messageError = 'A hora fim não pode ser menor que hora início';
        } else {
            $error = $this->checkDateTimeUsed($data);
            $messageError = 'Já existe uma reserva para esta área comum na agênda nesta data e horários escolhidos.';
        }

        if ($error) {
            return redirect()->back()->withErrors($messageError)->withInput();
        } else {

            try {
                $data['condominium_id'] = session()->get('condominium_id');
                if (!isset($data['user_condominium_id'])) {
                    $data['user_condominium_id'] = session()->get('user_condominium_id');
                }
                //dd($data);
                //$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->create($data);

                if ($dados) {
                    if ($dados['notify'] == 'y') {
                        //envia notificacao para o sindico se estiver marcada como sim4
                        $this->notificationAdmin($dados);
                    }

                    $response = trans("Reserva cadastrada com sucesso!");
                    return redirect()->back()->with('status', trans($response));
                }

            } catch (ValidatorException $e) {
                return redirect()->back()->withErrors($e->getMessageBag())->withInput();
            }
        }
    }

    public function checkDateTimeUsed(array $data, $id = "")
    {
        $data['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date'])));
        $error = false;
        if (isset($id)) {
            $verifica = $this->repository->findWhere([
                'reserve_area_id' => $data['reserve_area_id'],
                'id' => $id,
                [
                    'date', '!=', $data['date'],
                    'start_time', '!=', $data['start_time'],
                    'end_time', '!=', $data['end_time']
                ]
            ]);
        } else {
            $verifica = $this->repository->findWhere([
                'reserve_area_id' => $data['reserve_area_id'],
                'date' => $data['date']
            ]);
        }

        if ($verifica->toArray()) {
            foreach ($verifica as $veri) {
                if ($veri['start_time'] >= $data['start_time'] &&
                    $veri['end_time'] < $data['end_time']
                ) {
                    $error = true;
                    break;
                } elseif ($veri['start_time'] < $data['end_time']) {
                    $error = true;
                    break;
                }
                //echo $veri['start_time'].'<br />';
                //echo $veri['end_time'].'<br />';
            }
            //mensagem de erro informando que já existe
            // reserva para está area comum neste dia e horário
            //dd('não');
        }

        //echo '<br /><br />';
        //echo $data['start_time'].'<br />';
        //echo $data['end_time'];

        return $error;
    }

    public function notificationAdmin($data)
    {
        $users = $this->userCondominiumRepository->getUserAdm();
        if ($users->toArray()) {

            $data['date'] = date('d/m/Y', strtotime($data['date']));

            $communication['name'] = 'Nova reserva efetuada para ' . $data['date'];
            $communication['route'] = route('portal.condominium.diary.index');
            foreach ($users as $row) {

                $communication['condominium_id'] = session()->get('condominium_id');
                $communication['user_condominium_id'] = $row->id;

                $this->notificationService->create($communication);
            }

            return true;
        }
    }

    public function update(array $data, $id)
    {
        $data['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date'])));
        $data['start_time'] = $data['start_time'] . ':00';
        $data['end_time'] = $data['end_time'] . ':00';

        if ($data['date'] < Carbon::now()) {
            $error = true;
            $messageError = 'A escolhida não pode ser anterior a data atual.';
        } else if (strtotime($data['end_time']) <= strtotime($data['start_time'])) {
            $error = true;
            $messageError = 'A hora fim não pode ser menor que hora início.';
        } else {
            $error = $this->checkDateTimeUsed($data, $id);
            $messageError = 'Já existe uma reserva para esta área comum na agênda nesta data e horários escolhidos.';
        }

        if ($error) {
            return redirect()->back()->withErrors($messageError)->withInput();
        } else {
            try {
                $data['condominium_id'] = session()->get('condominium_id');
                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->update($data, $id);

                if ($dados) {
                    if (session()->get('user_condominium_id') != $dados['user_condominium_id'] &&
                        //enviar notificacao para usuario que criou caso um admin tenha editado o mesmo.
                        session()->get('admin') == 'y'
                    ) {
                        $this->notificationUser($dados['user_condominium_id'], $dados);
                    }

                    $response = trans("Reserva alterada com sucesso!");
                    return redirect()->back()->with('status', trans($response));
                }
            } catch (ValidatorException $e) {
                return redirect()->back()->withErrors($e->getMessageBag())->withInput();
            }
        }
    }

    public function notificationUser($userCondominiumId, $data)
    {
        if (isset($userCondominiumId)) {
            $data['date'] = date('d/m/Y', strtotime($data['date']));

            $communication['name'] = 'Alteração em sua reserva efetuada para ' . $data['date'];
            $communication['route'] = route('portal.condominium.diary.index');

            $communication['condominium_id'] = session()->get('condominium_id');
            $communication['user_condominium_id'] = $userCondominiumId;

            $this->notificationService->create($communication);
            return true;
        }
        return false;
    }

    public function destroy($id)
    {
        $check = $this->repository->findWhere([
            'id' => $id,
            'condominium_id' => session()->get('condominium_id'),
            ['date', '<', Carbon::now()]
        ]);

        if ($check->toArray() && session()->get('admin') == 'n') {
            $response = trans("Não é possível exluir uma reserva que já aconteceu");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Reserva excluida com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir a reserva");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

}