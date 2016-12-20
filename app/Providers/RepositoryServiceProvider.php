<?php

namespace CentralCondo\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * USER
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\User\UserRepository::class,
            \CentralCondo\Repositories\Portal\User\UserRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\User\UserRoleRepository::class,
            \CentralCondo\Repositories\Portal\User\UserRoleRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Condominium\UserRoleCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Condominium\UserRoleCondominiumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRoleRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRoleRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRepositoryEloquent::class
        );

        /**
         * CONDOMINIUM
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Finality\FinalityRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Finality\FinalityRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepositoryEloquent::class
        );

        /**
         * GROUP CONDOMINIUM
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepositoryEloquent::class
        );


        /**
         * SECURITY CAM
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\SecurityCam\SecurityCamRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\SecurityCam\SecurityCamRepositoryEloquent::class
        );

        /**
         * BLOCK
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockNomemclatureRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockNomemclatureRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockRepositoryEloquent::class
        );

        /**
         * UNIT
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepositoryEloquent::class
        );

        /**
         * PROVIDER
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepositoryEloquent::class
        );

        /**
         * DIARY
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepositoryEloquent::class
        );

        /**
         * CONTRACT
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractStatusRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractStatusRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractFileRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractFileRepositoryEloquent::class
        );

        /**
         * PERIODOCITY
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Periodicity\PeriodicityRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Periodicity\PeriodicityRepositoryEloquent::class
        );

        /**
         * MAINTENANCE
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepositoryEloquent::class
        );

        /**
         * RESERVE AREAS
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepository::class,
            \CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepositoryEloquent::class
        );

        /**
         * MESSAGE
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\MessageGroupRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\MessageGroupRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\MessageRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\MessageRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepositoryEloquent::class
        );

        /**
         * CALLED
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledCategoryRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledCategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledStatusRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledStatusRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledHistoricRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledHistoricRepositoryEloquent::class
        );

        /**
         * NOTIFICATION
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Notification\NotificationRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Notification\NotificationRepositoryEloquent::class
        );

        /**
         * COMMUNICATION
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationRepositoryEloquent   ::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepositoryEloquent::class
        );

        /**
         * DEMAIS
         */
        $this->app->bind(
            \CentralCondo\Repositories\Portal\StateRepository::class,
            \CentralCondo\Repositories\Portal\StateRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\CityRepository::class,
            \CentralCondo\Repositories\Portal\CityRepositoryEloquent::class
        );
        /*
        # CONDOMINIUM
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\UsersCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\UsersCondominiumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\UsersRoleCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\UsersRoleCondominiumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\CondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\CondominiumRepositoryEloquent::class
        );
        $this->app->bind(\CentralCondo\Repositories\Portal\Condominium\FinalityRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\FinalityRepositoryEloquent::class
        );

        # UNIT
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UsersUnitRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UsersUnitRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UsersUnitRoleRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UsersUnitRoleRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepositoryEloquent::class
        );

        # BLOCK
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockNomemclatureRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Block\BlockNomemclatureRepositoryEloquent::class
        );

        # GROUP
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Group\UsersGroupCondominiumRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Group\UsersGroupCondominiumRepositoryEloquent::class
        );

        //diary
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Diary\UsersDiaryRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Diary\UsersDiaryRepositoryEloquent::class
        );

        //MANAGE
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreasRepository::class,
            \CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreasRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractFileRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractFileRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractStatusRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Contract\ContractStatusRepositoryEloquent::class
        );

        //Maintenance
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepositoryEloquent::class
        );

        //Maintenance completed
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepository::class,
            \CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepositoryEloquent::class
        );

        //Periodicity
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Manage\PeriodicityRepository::class,
            \CentralCondo\Repositories\Portal\Manage\PeriodicityRepositoryEloquent::class
        );

        //UsefulPhones
        $this->app->bind(
            \CentralCondo\Repositories\Portal\UsefulPhonesRepository::class,
            \CentralCondo\Repositories\Portal\UsefulPhonesRepositoryEloquent::class
        );


        //SecurityCam
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\SecurityCamRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\SecurityCamRepositoryEloquent::class
        );

        //provider
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProvidersRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProvidersRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepository::class,
            \CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepositoryEloquent::class
        );

        //called
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledCategoryRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledCategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledStatusRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledStatusRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Called\CalledHistoricRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Called\CalledHistoricRepositoryEloquent::class
        );

        //forum
        $this->app->bind(
            \CentralCondo\Repositories\Portal\ForumRepository::class,
            \CentralCondo\Repositories\Portal\ForumRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\ForumResponseRepository::class,
            \CentralCondo\Repositories\Portal\ForumResponseRepositoryEloquent::class
        );

        //message
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\MessageRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\MessageRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\UsersMessageRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\UsersMessageRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Message\MessageGroupRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Message\MessageGroupRepositoryEloquent::class
        );

        //communication
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\Communication\Communication\UsersCommunicationRepository::class,
            \CentralCondo\Repositories\Portal\Communication\Communication\UsersCommunicationRepositoryEloquent::class
        );

        //achados e perdidos
        $this->app->bind(
            \CentralCondo\Repositories\Portal\LostAndFoundRepository::class,
            \CentralCondo\Repositories\Portal\LostAndFoundRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\LostAndFoundCompletedRepository::class,
            \CentralCondo\Repositories\Portal\LostAndFoundCompletedRepositoryEloquent::class
        );

        //outros
        $this->app->bind(
            \CentralCondo\Repositories\Portal\StateRepository::class,
            \CentralCondo\Repositories\Portal\StateRepositoryEloquent::class
        );
        $this->app->bind(
            \CentralCondo\Repositories\Portal\CityRepository::class,
            \CentralCondo\Repositories\Portal\CityRepositoryEloquent::class
        );

        $this->app->bind(
            \CentralCondo\Repositories\Portal\Notification\NotificationRepository::class,
            \CentralCondo\Repositories\Portal\Notification\NotificationRepositoryEloquent::class
        );
        */


        $this->app->bind(\CentralCondo\Repositories\PostRepository::class, \CentralCondo\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserRoleRepository::class, \CentralCondo\Repositories\UserRoleRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserRepository::class, \CentralCondo\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserRoleCondominiumRepository::class, \CentralCondo\Repositories\UserRoleCondominiumRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\PortalCondominiumFinalityRepository::class, \CentralCondo\Repositories\PortalCondominiumFinalityRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\FinalityRepository::class, \CentralCondo\Repositories\FinalityRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\StateRepository::class, \CentralCondo\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CityRepository::class, \CentralCondo\Repositories\CityRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CondominiumRepository::class, \CentralCondo\Repositories\CondominiumRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserCondominiumRepository::class, \CentralCondo\Repositories\UserCondominiumRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\BlockNomemclatureRepository::class, \CentralCondo\Repositories\BlockNomemclatureRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\BlockRepository::class, \CentralCondo\Repositories\BlockRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UnitTypeRepository::class, \CentralCondo\Repositories\UnitTypeRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UnitRepository::class, \CentralCondo\Repositories\UnitRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserUnitRoleRepository::class, \CentralCondo\Repositories\UserUnitRoleRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserUnitRepository::class, \CentralCondo\Repositories\UserUnitRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\SecurityCamRepository::class, \CentralCondo\Repositories\SecurityCamRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\GroupCondominiumRepository::class, \CentralCondo\Repositories\GroupCondominiumRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserGroupCondominiumRepository::class, \CentralCondo\Repositories\UserGroupCondominiumRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\ProviderCategoryRepository::class, \CentralCondo\Repositories\ProviderCategoryRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\ProviderRepository::class, \CentralCondo\Repositories\ProviderRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\ContractStatusRepository::class, \CentralCondo\Repositories\ContractStatusRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\ContractRepository::class, \CentralCondo\Repositories\ContractRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\ContractFileRepository::class, \CentralCondo\Repositories\ContractFileRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\PeriodicityRepository::class, \CentralCondo\Repositories\PeriodicityRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\MaintenanceRepository::class, \CentralCondo\Repositories\MaintenanceRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\MaintenanceCompletedRepository::class, \CentralCondo\Repositories\MaintenanceCompletedRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\ReserveAreaRepository::class, \CentralCondo\Repositories\ReserveAreaRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\DiaryRepository::class, \CentralCondo\Repositories\DiaryRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\MessageRepository::class, \CentralCondo\Repositories\MessageRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\MessageReplyRepository::class, \CentralCondo\Repositories\MessageReplyRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\MessageGroupRepository::class, \CentralCondo\Repositories\MessageGroupRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserMessageRepository::class, \CentralCondo\Repositories\UserMessageRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\MessageRepository::class, \CentralCondo\Repositories\MessageRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CalledCategoryRepository::class, \CentralCondo\Repositories\CalledCategoryRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CalledStatusRepository::class, \CentralCondo\Repositories\CalledStatusRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CalledRepository::class, \CentralCondo\Repositories\CalledRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CalledHistoricRepository::class, \CentralCondo\Repositories\CalledHistoricRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\NotificationRepository::class, \CentralCondo\Repositories\NotificationRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CommunicationRepository::class, \CentralCondo\Repositories\CommunicationRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\CommunicationGroupRepository::class, \CentralCondo\Repositories\CommunicationGroupRepositoryEloquent::class);
        $this->app->bind(\CentralCondo\Repositories\UserCommunicationRepository::class, \CentralCondo\Repositories\UserCommunicationRepositoryEloquent::class);
        //:end-bindings:
    }
}
