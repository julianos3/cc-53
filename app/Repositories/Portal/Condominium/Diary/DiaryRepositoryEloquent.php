<?php

namespace CentralCondo\Repositories\Portal\Condominium\Diary;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository;
use CentralCondo\Entities\Portal\Condominium\Diary\Diary;
use CentralCondo\Validators\Portal\Condominium\Diary\DiaryValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class DiaryRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Diary
 */
class DiaryRepositoryEloquent extends BaseRepository implements DiaryRepository
{

    public function getAllCondominium()
    {
        $dados = $this->with(['reserveArea', 'userCondominium'])->orderBy('date', 'desc')
            ->findWhere([
                'condominium_id' => session()->get('condominium_id')
            ]);

        return $dados;
    }

    public function getDiary($id)
    {
        $dados = $this->with(['reserveArea', 'userCondominium'])->orderBy('date', 'desc')
            ->findWhere([
                'condominium_id' => session()->get('condominium_id'),
                'id' => $id
            ]);

        return $dados[0];
    }

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
