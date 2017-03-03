<?php

namespace CentralCondo\Http\Controllers\Site;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Site\SeoPageRepository;
use Artesaos\SEOTools\Facades\SEOMeta as SEOMETA;
use Artesaos\SEOTools\Facades\TwitterCard as Twitter;
use Illuminate\Support\Facades\Route;

class BeneficiosController extends Controller
{

    protected $seoPageRepository;

    public function __construct(SeoPageRepository $seoPageRepository)
    {
        $this->seoPageRepository = $seoPageRepository;
    }

    public function index()
    {
        $seo = $this->seoPageRepository->find(3);

        SEOMeta::setTitle($seo->name);
        SEOMeta::setDescription($seo->description);
        SEOMeta::setCanonical(Route::getCurrentRequest()->getUri());
        SEOMeta::addKeyword($seo->keywords);
        Twitter::setTitle($seo->name);
        Twitter::setSite('@centralcondo');

        return view('site.beneficios');
    }
}
