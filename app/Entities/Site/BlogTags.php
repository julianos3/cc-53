<?php

namespace CentralCondo\Entities\Site;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BlogTags extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'blog_id',
        'tags_id'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }

}
