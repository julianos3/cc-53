<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\BlogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlogPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class BlogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlogTransformer();
    }
}
