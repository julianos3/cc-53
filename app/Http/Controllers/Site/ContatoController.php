<?php

namespace CentralCondo\Http\Controllers\Site;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Site\ContactsRequest;
use CentralCondo\Repositories\Site\ContactRepository;
use CentralCondo\Repositories\Site\NewsletterRepository;
use CentralCondo\Validators\Site\ContactValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Artesaos\SEOTools\Facades\SEOMeta as SEOMETA;
use Artesaos\SEOTools\Facades\TwitterCard as Twitter;
use CentralCondo\Repositories\Site\SeoPageRepository;
use Illuminate\Support\Facades\Route;

class ContatoController extends Controller
{

    protected $repository;

    protected  $validator;

    protected $newsletterRepository;

    protected $seoPageRepository;

    public function __construct(ContactRepository $repository,
                                ContactValidator $validator,
                                NewsletterRepository $newsletterRepository,
                                SeoPageRepository $seoPageRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->newsletterRepository = $newsletterRepository;
        $this->seoPageRepository = $seoPageRepository;
    }

    public function index()
    {
        $seo = $this->seoPageRepository->find(5);

        SEOMeta::setTitle($seo->name);
        SEOMeta::setDescription($seo->description);
        SEOMeta::setCanonical(Route::getCurrentRequest()->getUri());
        SEOMeta::addKeyword($seo->keywords);
        Twitter::setTitle($seo->name);
        Twitter::setSite('@centralcondo');

        return view('site.contato');
    }

    public function store(ContactsRequest $request)
    {
        try {
            $data = $request->all();
            $data['view'] = 'n';
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $contact = $this->repository->create($data);

            $this->createNewsletter($data);

            return response()->json([
                'success' => true,
                'message' => 'Contato enviado com sucesso!',
                'data' => $contact->toArray(),
            ]);

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function createNewsletter($data)
    {
        $verifica = $this->newsletterRepository->findWhere(['email' => $data['email']]);
        if (!$verifica->toArray()) {
            $this->newsletterRepository->create($data);
        }

        return true;
    }

}
