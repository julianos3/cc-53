<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ContactTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContactPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ContactPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContactTransformer();
    }
}
