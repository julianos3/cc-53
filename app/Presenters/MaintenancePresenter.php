<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\MaintenanceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MaintenancePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class MaintenancePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MaintenanceTransformer();
    }
}
