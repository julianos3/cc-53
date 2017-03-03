<?php

namespace CentralCondo\Repositories\Site;

use Carbon\Carbon;
use CentralCondo\Entities\Site\Blog;
use CentralCondo\Validators\Site\BlogValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BlogRepositoryEloquent
 * @package CentralCondo\Repositories\Site
 */
class BlogRepositoryEloquent extends BaseRepository implements BlogRepository
{

    public function getTags($idTag)
    {
        $dados = $this->scopeQuery(function ($query) use ($idTag) {
            return $query->leftjoin('blog_tags', 'blog_tags.blog_id', '=', 'blogs.id')
                ->leftjoin('blog_images', 'blog_images.blog_id', '=', 'blogs.id')
                ->where('blog_tags.tags_id', $idTag)
                ->where('blogs.active', 'y')
                ->where('blog_images.cover', 'y')
                ->where('blogs.date_publish', '<=', Carbon::now())->groupBy('blogs.id','blog_tags.id', 'blog_images.id')->orderBy('blogs.date', 'desc');
        })->all();

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Blog::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return BlogValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
