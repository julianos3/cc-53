<?php

namespace CentralCondo\Repositories\Portal\Condominium\Diary;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository;
use CentralCondo\Entities\Portal\Condominium\Diary\Diary;
use CentralCondo\Validators\Portal\Condominium\Diary\DiaryValidator;

/**
 * Class DiaryRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Diary
 */
class DiaryRepositoryEloquent extends BaseRepository implements DiaryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Diary::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DiaryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
