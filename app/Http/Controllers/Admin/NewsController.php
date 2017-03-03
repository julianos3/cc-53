<?php

namespace AgenciaS3\Http\Controllers\Admin;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\NewsRequest;
use AgenciaS3\Http\Requests\TeamRequest;
use AgenciaS3\Repositories\CategoriesRepository;
use AgenciaS3\Repositories\ExpertiseRepository;
use AgenciaS3\Repositories\NewsExpertisesRepository;
use AgenciaS3\Repositories\NewsRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\NewsValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class NewsController extends Controller
{

    /**
     * @var NewsRepository
     */
    protected $repository;

    /**
     * @var NewsValidator
     */
    protected $validator;

    /**
     * @var NewsGaleryController
     */
    protected $newsGaleryController;

    /**
     * @var CategoriesRepository
     */
    protected $categoriesRepository;

    /**
     * @var NewsTagsController
     */
    protected $newsTagsController;
    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    public function __construct(NewsRepository $repository,
                                NewsValidator $validator,
                                NewsTagsController $newsTagsController,
                                NewsGaleryController $newsGaleryController,
                                CategoriesRepository $categoriesRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->newsTagsController = $newsTagsController;
        $this->newsGaleryController = $newsGaleryController;
        $this->categoriesRepository = $categoriesRepository;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/news';
    }

    public function index()
    {
        $config['title'] = "Notícias";
        $config['activeMenu'] = 'pages';
        $config['activeMenuN2'] = 'news';

        $dados = $this->repository->orderBy('date', 'desc')->paginate();

        return view('admin.news.index', compact('dados', 'config'));
    }

    public function create()
    {
        $config['title'] = "Notícias";
        $config['activeMenu'] = 'pages';
        $config['activeMenuN2'] = 'news';
        $config['action'] = 'Cadastrar';

        $categories = $this->categoriesRepository->orderBy('order', 'asc')->all();

        return view('admin.news.create', compact('config', 'categories'));
    }

    public function store(NewsRequest $request)
    {
        try {
            $data = $request->all();

            $data['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date'])));
            $data['date_publish'] = $data['date_publish'] . ':00';
            $data['date_publish'] = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data['date_publish'])));
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $banner = $this->repository->create($data);

            $response = [
                'success' => 'Registro atualizado com sucesso!',
                'data' => $banner->toArray(),
            ];

            return redirect()->back()->with('success', $response['success']);

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

    public function edit($id)
    {
        $config['title'] = "Notícias";
        $config['activeMenu'] = 'pages';
        $config['activeMenuN2'] = 'news';
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $dados['date'] = date('d/m/Y', strtotime($dados->date));
        $dados['date_publish'] = date('d/m/Y H:i', strtotime($dados->date_publish));

        $categories = $this->categoriesRepository->orderBy('order', 'asc')->all();

        return view('admin.news.edit', compact('dados', 'config', 'categories'));
    }

    public function update(NewsRequest $request, $id)
    {
        try {
            $data = $request->all();

            $data['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date'])));
            $data['date_publish'] = $data['date_publish'] . ':00';
            $data['date_publish'] = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data['date_publish'])));
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $banner = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!',
                'data' => $banner->toArray(),
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function active($id)
    {
        try {
            $dados = $this->repository->find($id);

            if ($dados->active == 'y') {
                $data['active'] = 'n';
            } else {
                $data['active'] = 'y';
            }

            $update = $this->repository->update($data, $id);

            return $update;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        $this->newsGaleryController->destroyGallery($id);
        $this->newsTagsController->destroyAllNews($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
