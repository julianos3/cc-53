<?php

namespace CentralCondo\Validators\Site;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BlogTagsValidator extends LaravelValidator
{

    protected $rules = [
        'blog_id' => 'required',
        'tags_id' => 'required'
   ];
}
