<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Kalnoy\Nestedset\NodeTrait;

Relation::morphMap([
    'movie' => 'App\Movie',
    'post' => 'App\Post'
]);

class Comment extends Model
{
    use NodeTrait;
    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }
}
