<?php

namespace CentralCondo\Http\Controllers\Admin;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Admin\AdminRequest;
use CentralCondo\Repositories\Site\BlogTagsRepository;
use CentralCondo\Repositories\Site\TagRepository;
use CentralCondo\Services\Util\UtilObjeto;
use CentralCondo\Validators\Site\TagValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TagsController extends Controller
{

    /**
     * @var TagRepository
     */
    protected $repository;

    /**
     * @var TagValidator
     */
    protected $validator;

    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    /**
     * @var BlogTagsRepository
     */
    protected $blogTagsRepository;

    public function __construct(TagRepository $repository,
                                TagValidator $validator,
                                UtilObjeto $utilObjeto,
                                BlogTagsRepository $blogTagsRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
        $this->blogTagsRepository = $blogTagsRepository;
    }

    public function index()
    {
        $config['title'] = "Tags";
        $config['activeMenu'] = 'tags';

        $dados = $this->repository->orderBy('name', 'asc')->paginate();

        return view('admin.tags.index', compact('dados', 'config'));
    }

    public function create()
    {
        $config['title'] = "Tags";
        $config['activeMenu'] = 'tags';
        $config['action'] = 'Cadastrar';

        return view('admin.tags.create', compact('config'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();

            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro atualizado com sucesso!',
                'data' => $dados->toArray(),
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
        $config['title'] = "Tags";
        $config['activeMenu'] = 'tags';
        $config['action'] = 'Editar';

        $dados = $this->repository->find($id);
        return view('admin.tags.edit', compact('dados', 'config'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!',
                'data' => $dados->toArray(),
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
            if ($dados->toArray()) {

                if ($dados->active == 'y') {
                    $data['active'] = 'n';
                } else {
                    $data['active'] = 'y';
                }

                $dados = $this->repository->update($data, $id);

                return $dados;
            }

            return false;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        $this->deleteBlogTags($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function deleteBlogTags($id)
    {
        $dados = $this->blogTagsRepository->findWhere(['tags_id' => $id]);
        if($dados->toArray()){
            foreach($dados as $dado){
                $this->blogTagsRepository->delete($dado['id']);
            }
        }

        return true;
    }

}
