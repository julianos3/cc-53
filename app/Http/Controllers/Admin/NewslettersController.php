<?php

namespace AgenciaS3\Http\Controllers\Admin;

use AgenciaS3\Entities\Newsletter;
use AgenciaS3\Http\Controllers\Controller;
use Illuminate\Http\Request;

use AgenciaS3\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use AgenciaS3\Http\Requests\NewsletterCreateRequest;
use AgenciaS3\Http\Requests\NewsletterUpdateRequest;
use AgenciaS3\Repositories\NewsletterRepository;
use AgenciaS3\Validators\NewsletterValidator;


class NewslettersController extends Controller
{

    /**
     * @var NewsletterRepository
     */
    protected $repository;

    /**
     * @var NewsletterValidator
     */
    protected $validator;

    public function __construct(NewsletterRepository $repository, NewsletterValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {

        $config['title'] = "Newsletter";
        $config['activeMenu'] = 'contact';
        $config['activeMenuN2'] = 'newslleters';
        $dados = $this->repository->orderBy('created_at', 'desc')->paginate();

        return view('admin.newsletters.index', compact('dados', 'config'));
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Registro excluído com sucesso!',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('success', 'Registro excluído com sucesso!');
    }

    public function export()
    {
        $dados = Newsletter::select('id', 'name', 'email', 'created_at')->get();
        return Excel::create('newsletters', function($excel) use($dados) {
            $excel->sheet('Sheet 1', function($sheet) use($dados) {
                $sheet->fromArray($dados);
            });
        })->export('xls');

    }
}
