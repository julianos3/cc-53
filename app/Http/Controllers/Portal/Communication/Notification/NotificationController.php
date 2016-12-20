<?php

namespace CentralCondo\Http\Controllers\Portal\Communication\   Notification;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Communication\Notification\NotificationRepository;
use CentralCondo\Services\Portal\Communication\Notification\NotificationService;
use CentralCondo\Services\Util\UtilObjeto;

class NotificationController extends Controller
{

    /**
     * @var NotificationRepository
     */
    protected $repository;

    /**
     * @var NotificationService
     */
    private $service;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * NotificationController constructor.
     * @param NotificationRepository $repository
     * @param NotificationService $service
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(NotificationRepository $repository,
                                NotificationService $service,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = "Notificações";
        $dados = $this->repository
            ->orderBy('created_at', 'desc')
            ->with(['userCondominium'])
            ->findWhere([
                'condominium_id' => session()->get('condominium_id'),
                'user_condominium_id' => session()->get('user_condominium_id')
            ]);

        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.communication.notification.index', compact('config', 'dados'));
    }

    public function show()
    {
        $notification = $this->repository
            ->orderBy('created_at', 'desc')
            ->with(['userCondominium'])
            ->findWhere([
                'condominium_id' => session()->get('condominium_id'),
                'user_condominium_id' => session()->get('user_condominium_id'),
                'view' => 'n'
            ]);

        $totalClick = 0;
        if ($notification->toArray()) {
            foreach ($notification as $row) {
                if ($row->click == 'n') {
                    $totalClick++;
                }
            }
        }

        return view('portal.communication.notification.show', compact('notification', 'totalClick'));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function click()
    {
        return $this->service->clickAll(session()->get('user_condominium_id'));
    }
}
