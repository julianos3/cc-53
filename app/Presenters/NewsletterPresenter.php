<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\NewsletterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NewsletterPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class NewsletterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsletterTransformer();
    }
}
