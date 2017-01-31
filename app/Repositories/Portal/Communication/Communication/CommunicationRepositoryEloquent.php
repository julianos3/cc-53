<?php

namespace CentralCondo\Repositories\Portal\Communication\Communication;

use CentralCondo\Entities\Portal\Communication\Communication\Communication;
use CentralCondo\Validators\Portal\Communication\Communication\CommunicationValidator;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CommunicationRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Communication
 */
class CommunicationRepositoryEloquent extends BaseRepository implements CommunicationRepository, CacheableInterface
{
    use CacheableRepository;

    public function getId($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with(['communicationGroup', 'userCommunication'])
            ->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    public function getAllCondominiumAdm()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('date_display', 'desc')
            ->with(['userCondominium'])
            ->findWhere([
                'condominium_id' => $condominiumId
            ]);

        return $dados;
    }

    public function getAllCondominium()
    {
        $userRoleCondominium = session()->get('user_role_condominium');
        $condominiumId = session()->get('condominium_id');

        if ($userRoleCondominium == 1 || $userRoleCondominium == 2 ||
            $userRoleCondominium == 3 || $userRoleCondominium == 7 ||
            $userRoleCondominium == 9
        ) {
            $dados = $this->orderBy('created_at', 'desc')
                ->with(['userCondominium'])
                ->findWhere([
                    'condominium_id' => $condominiumId,
                    ['date_display', '>=', date('yyyy-mm-dd')]
                ]);

        } else {
            $dados = $this->orderBy('created_at', 'desc')
                ->with(['userCondominium'])
                ->findWhere([
                    'condominium_id' => $condominiumId,
                    'all_user' => 'y',
                    ['date_display', '>=', date('yyyy-mm-dd')]
                ]);

        }

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Communication::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return CommunicationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
