<?php

namespace CentralCondo\Entities\Site;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BlogImages extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'blog_id',
        'image',
        'label',
        'order',
        'cover'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
