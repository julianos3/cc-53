<?php

namespace CentralCondo\Http\Controllers\Site;

use Carbon\Carbon;
use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Site\BlogRepository;
use CentralCondo\Repositories\Site\BlogTagsRepository;
use CentralCondo\Repositories\Site\TagRepository;
use CentralCondo\Services\Util\UtilObjeto;
use Illuminate\Http\Request;
use CentralCondo\Repositories\Site\SeoPageRepository;
use Artesaos\SEOTools\Facades\SEOMeta as SEOMETA;
use Artesaos\SEOTools\Facades\TwitterCard as Twitter;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{

    protected $repository;

    protected $utilObjeto;

    protected $tagRepository;

    protected $blogTagsRepository;

    protected $seoPageRepository;

    public function __construct(BlogRepository $repository,
                                UtilObjeto $utilObjeto,
                                TagRepository $tagRepository,
                                BlogTagsRepository $blogTagsRepository,
                                SeoPageRepository $seoPageRepository)
    {
        $this->repository = $repository;
        $this->utilObjeto = $utilObjeto;
        $this->tagRepository = $tagRepository;
        $this->blogTagsRepository = $blogTagsRepository;
        $this->seoPageRepository = $seoPageRepository;
    }

    public function index()
    {
        $seo = $this->seoPageRepository->find(4);

        SEOMeta::setTitle($seo->name);
        SEOMeta::setDescription($seo->description);
        SEOMeta::setCanonical(Route::getCurrentRequest()->getUri());
        SEOMeta::addKeyword($seo->keywords);
        Twitter::setTitle($seo->name);
        Twitter::setSite('@centralcondo');

        $blogs = $this->repository
            ->orderBy('date', 'desc')->with(['blogTags', 'images'])
            ->findWhere([
                'active' => 'y',
                ['date_publish', '<=', Carbon::now()]
            ]);
        $blogs = $this->utilObjeto->paginate($blogs, 5);
        $tags = $this->tagRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);

        return view('site.blog', compact('blogs', 'tags'));
    }

    public function tag($seoLink)
    {
        $tag = $this->tagRepository->findWhere(['seo_link' => $seoLink]);
        $tag = $tag[0];

        $blogs = $this->repository->getTags($tag->id);
        $blogs = $this->utilObjeto->paginate($blogs, 5);
        $tags = $this->tagRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);

        return view('site.blog', compact('blogs', 'tags'));
    }

    public function show($id, $seoLink)
    {
        $blog = $this->repository
            ->orderBy('date', 'desc')->with(['blogTags', 'images'])
            ->findWhere([
                'id' => $id,
                'active' => 'y',
                ['date_publish', '<=', Carbon::now()]
            ]);
        $blog = $blog[0];

        $tags = $this->tagRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        $lastBlogs = $this->repository
                ->orderBy('date', 'desc')
                ->findWhere([
                    'active' => 'y',
                    [
                        'id', '!=', $id,
                        'date_publish', '<=', Carbon::now()
                    ]
                ]);
        $lastBlogs = $this->utilObjeto->paginate($lastBlogs, 3);

        return view('site.blog_show', compact('blog', 'tags', 'lastBlogs'));
    }

}
