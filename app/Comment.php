<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'movie' => 'App\Movie',
    'post' => 'App\Post'
]);

class Comment extends Model
{
    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }
}
