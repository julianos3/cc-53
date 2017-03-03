<?php

namespace CentralCondo\Http\Controllers\Admin;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Admin\AdminRequest;
use CentralCondo\Repositories\Site\BlogRepository;
use CentralCondo\Services\Util\UtilObjeto;
use CentralCondo\Validators\Site\BlogValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class BlogController extends Controller
{

    /**
     * @var BlogRepository
     */
    protected $repository;

    /**
     * @var BlogValidator
     */
    protected $validator;

    /**
     * @var
     */
    protected $newsTagsController;

    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    public function __construct(BlogRepository $repository,
                                BlogValidator $validator,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/blog';
    }

    public function index()
    {
        $config['title'] = "Blog";
        $config['activeMenu'] = 'blog';

        $dados = $this->repository->orderBy('date', 'desc')->paginate();

        return view('admin.blog.index', compact('dados', 'config'));
    }

    public function create()
    {
        $config['title'] = "Blog";
        $config['activeMenu'] = 'blog';
        $config['action'] = 'Cadastrar';

        return view('admin.blog.create', compact('config', 'categories'));
    }

    public function store(AdminRequest $request)
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
        $config['title'] = "Blog";
        $config['activeMenu'] = 'blog';
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $dados['date'] = date('d/m/Y', strtotime($dados->date));
        $dados['date_publish'] = date('d/m/Y H:i', strtotime($dados->date_publish));

        //$categories = $this->categoriesRepository->orderBy('order', 'asc')->all();

        return view('admin.blog.edit', compact('dados', 'config', 'categories'));
    }

    public function update(AdminRequest $request, $id)
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
        //$this->newsGaleryController->destroyGallery($id);
        //$this->newsTagsController->destroyAllNews($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
