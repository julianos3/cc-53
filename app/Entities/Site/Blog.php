<?php

namespace CentralCondo\Entities\Site;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Blog extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'description',
        'date',
        'active',
        'date_publish',
        'seo_link'
    ];

    public function images()
    {
        return $this->hasMany(BlogImages::class);
    }

    public function blogTags()
    {
        return $this->hasMany(BlogTags::class);
    }

}
