<?php

namespace CentralCondo\Http\Controllers\Admin;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Admin\AdminRequest;
use CentralCondo\Repositories\Site\BlogImagesRepository;
use CentralCondo\Services\Util\UtilObjeto;
use CentralCondo\Validators\Site\BlogImagesValidator;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogImagesController extends Controller
{

    /**
     * @var BlogImagesRepository
     */
    protected $repository;

    /**
     * @var BlogImagesValidator
     */
    protected $validator;

    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    public function __construct(BlogImagesRepository $repository,
                                BlogImagesValidator $validator,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/blog';
    }

    public function index($id)
    {
        $config['title'] = "Blog > Galeria";
        $config['activeMenu'] = 'blog';
        $config['galery'] = true;
        $routeUpload = route('admin.blog.galery.upload', ['id' => $id]);

        $dados = $this->repository->orderBy('order', 'asc')->findWhere(['blog_id' => $id]);

        return view('admin.blog.galery.index', compact('dados', 'id', 'config', 'routeUpload'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();

            $data['order'] = 0;
            $data['cover'] = 'n';

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

    public function upload(AdminRequest $request, $id)
    {
        $data = $request->all();
        $this->validate($request, [
            'Filedata' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //$imageName = md5(time()) . '.' . $data['Filedata']->getClientOriginalExtension();
        $imageName = md5($data['Filedata']->getClientOriginalName() . date('mdyshimydsi')) . '.' . $data['Filedata']->getClientOriginalExtension();
        $request->Filedata->move(public_path($this->path), $imageName);
        $data['image'] = $imageName;
        $data['blog_id'] = $id;
        $data['label'] = '';
        $data['order'] = 0;

        $verifica = $this->repository->findWhere(['blog_id' => $id]);
        if ($verifica->toArray()) {
            $data['cover'] = 'n';
        } else {
            $data['cover'] = 'y';
        }

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
        $dados = $this->repository->create($data);

        return $dados;
    }

    public function destroyGallery($idBlog)
    {
        $dados = $this->repository->findWhere(['blog_id' => $idBlog]);
        if ($dados->toArray()) {
            foreach ($dados as $row) {
                $this->destroy($row->id);
            }
        }
        return true;
    }

    public function destroy($id)
    {
        $this->destroyImage($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function destroyImage($id)
    {
        $dados = $this->repository->find($id);

        $nameImage = 'blog/' . $dados->file;
        Storage::disk('local')->delete($nameImage);

        $data['file'] = '';
        $this->repository->update($data, $id);

        return redirect()->back()->with('success', 'Imagem removida com sucesso!');
    }

    public function updateLabel(AdminRequest $request, $id)
    {
        $data = $request->all();
        $dados = $this->repository->update($data, $id);

        return $dados['label'];
    }

    public function cover(AdminRequest $request, $id)
    {
        $data = $request->all();
        //remove capa de todos
        $this->repository->scopeQuery(function ($query) use ($data) {
            $query->where([
                'blog_id' => $data['id_album'],
                'cover' => 'y'
            ])->update(['cover' => 'n']);
            return $query->where(['blog_id' => $data['id_album'], 'cover' => 'n']);
        })->all();

        $data['cover'] = 'y';
        $dados = $this->repository->update($data, $id);

        return $dados;
    }

    public function order(AdminRequest $request, $id)
    {
        $item = '';
        extract($request->all());
        parse_str($item, $arr);
        $dados = '';

        foreach ($arr['item'] as $pos => $foto_id) {
            $image['order'] = $pos;
            $dados = $this->repository->update($image, $foto_id);
        }

        return $dados;
    }

}
