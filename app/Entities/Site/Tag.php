<?php

namespace CentralCondo\Entities\Site;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tag extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'active',
        'seo_link'
    ];

    public function blogTags()
    {
        return $this->hasMany(BlogTags::class);
    }

}
