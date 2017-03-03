<?php

namespace CentralCondo\Http\Controllers\Admin;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Admin\AdminRequest;
use CentralCondo\Repositories\Site\BlogTagsRepository;
use CentralCondo\Repositories\Site\TagRepository;
use CentralCondo\Validators\Site\BlogTagsValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogTagsController extends Controller
{

    /**
     * @var BlogTagsRepository
     */
    protected $repository;

    /**
     * @var BlogTagsValidator
     */
    protected $validator;

    /**
     * @var TagRepository
     */
    protected $tagsRepository;

    public function __construct(BlogTagsRepository $repository,
                                BlogTagsValidator $validator,
                                TagRepository $tagsRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->tagsRepository = $tagsRepository;
    }

    public function index($id)
    {
        $config['title'] = "Blog";
        $config['activeMenu'] = 'blog';
        $config['action'] = 'Tags';
        $tags = $this->tagsRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        $dados = $this->repository->findWhere(['blog_id' => $id]);

        return view('admin.blog.tags', compact('config', 'tags', 'dados', 'id'));
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $verifica = $this->repository->findWhere([
            'blog_id' => $data['blog_id'], 'tags_id' => $data['tags_id']
        ]);

        if ($verifica->toArray()) {
            return redirect()->back()->withErrors('Tag já adiciona neste post.')->withInput();
        } else {
            try {

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
    }

    public function destroyAllNews($idNews)
    {
        $dados = $this->repository->findWhere(['blog_id' => $idNews]);
        if ($dados->toArray()) {
            foreach ($dados as $row) {
                $this->destroy($row->id);
            }
        }
        return true;
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}