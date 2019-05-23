<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'movie' => 'App\Movie',
    'post' => 'App\Post'
]);

class Tag extends Model
{
    public $timestamps = false;

    public function movies()
    {
        return $this->morphedByMany('App\Movie', 'taggable');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }
}
