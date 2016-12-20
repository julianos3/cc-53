<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Unit;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Condominium\Unit\UnitRequest;
use CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepository;
use CentralCondo\Services\Portal\Condominium\Unit\UnitService;
use CentralCondo\Services\Util\UtilObjeto;
use Illuminate\Support\Facades\Response;

class UnitController extends Controller
{
    /**
     * @var UnitRepository
     */
    protected $repository;

    /**
     * @var UnitService
     */
    private $service;

    /**
     * @var BlockRepository
     */
    private $blockRepository;

    /**
     * @var UnitTypeRepository
     */
    private $unitTypeRepository;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * UnitController constructor.
     * @param UnitRepository $repository
     * @param UnitService $service
     * @param BlockRepository $blockRepository
     * @param UnitTypeRepository $unitTypeRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(UnitRepository $repository,
                                UnitService $service,
                                BlockRepository $blockRepository,
                                UnitTypeRepository $unitTypeRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->blockRepository = $blockRepository;
        $this->unitTypeRepository = $unitTypeRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = trans("Unidades");

        //session()->get('condominium_id');
        $dados = $this->repository->unitAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.condominium.unit.index', compact('config', 'dados'));
    }

    public function create()
    {
        $config['title'] = "Nova Unidade";
        $block = $this->blockRepository->getAllCondominium();
        $type = $this->unitTypeRepository->getTypes();

        return view('portal.condominium.unit.create', compact('config', 'block', 'type'));
    }

    public function store(UnitRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Unidade";

        $dados = $this->repository->getUnit($id);
        $block = $this->blockRepository->getAllCondominium();
        $type = $this->unitTypeRepository->getTypes();

        return view('portal.condominium.unit.edit', compact('config', 'dados', 'block', 'type'));
    }

    public function update(UnitRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function clear($condominiumId)
    {
        return $this->service->clear($condominiumId);
    }

    public function block($blockId)
    {
        $dados = $this->repository->findWhere([
            'block_id' => $blockId
        ]);

        return Response::json($dados);
    }

    public function garage()
    {
        $config['title'] = "Garagem";
        $dados = $this->repository->garageAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.condominium.unit.garage.index', compact('config', 'dados'));
    }

    public function garageCreate()
    {
        $config['title'] = "Nova Garagem";
        $unit = $this->repository->unitAllCondominium();

        return view('portal.condominium.unit.garage.create', compact('config', 'unit'));
    }

    public function garageStore(UnitRequest $request)
    {
        return $this->service->createGarage($request->all());
    }

    public function garageEdit($id)
    {
        $config['title'] = "Alterar Garagem";
        $dados = $this->repository->getUnit($id);
        $unit = $this->repository->unitAllCondominium();

        return view('portal.condominium.unit.garage.edit', compact('config', 'dados', 'unit'));
    }

    public function garageUpdate(UnitRequest $request, $id)
    {
        return $this->service->updateGarage($request->all(), $id);
    }

}
