<?php

namespace AgenciaS3\Http\Controllers\Admin;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\UserValidator;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    public function __construct(UserRepository $repository,
                                UserValidator $validator,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/users/';
    }

    public function index()
    {
        $config['title'] = "Usuários";
        $config['activeMenu'] = 'users';

        $dados = $this->repository->orderBy('name', 'asc')->paginate();

        return view('admin.users.index', compact('dados', 'config'));
    }

    public function create()
    {
        $config['title'] = "Usuários";
        $config['activeMenu'] = 'users';
        $config['action'] = 'Cadastrar';

        return view('admin.users.create', compact('config'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();

            if(isset($data['image'])) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = md5(time()) . '.' . $data['image']->getClientOriginalExtension();
                $request->image->move(public_path($this->path), $imageName);
                $data['image'] = $imageName;
            }else{
                $data['image'] = '';
            }

            $data['password'] = bcrypt($data['password']);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $user = $this->repository->create($data);

            $response = [
                'success' => 'Registro atualizado com sucesso!',
                'data' => $user->toArray(),
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
        $config['title'] = "Usuários";
        $config['activeMenu'] = 'users';
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);

        return view('admin.users.edit', compact('dados', 'config'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();

            if (isset($data['image'])) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = md5(time()) . '.' . $data['image']->getClientOriginalExtension();
                $request->image->move(public_path($this->path), $imageName);
                $data['image'] = $imageName;
            }

            $data['password'] = bcrypt($data['password']);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $User = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!',
                'data' => $User->toArray(),
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

            $User = $this->repository->update($data, $id);

            return $User;

        } catch (ValidatorException $e) {
            return false;
        }
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

        if($dados->image != '') {

            $nameImage = 'users/' . $dados->image;
            Storage::disk('local')->delete($nameImage);

            $data['image'] = '';
            $this->repository->update($data, $id);
        }

        return redirect()->back()->with('success', 'Imagem removida com sucesso!');
    }
}
