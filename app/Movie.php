<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function watched()
    {
        return $this
            ->belongsToMany('App\User', 'watchlist')
            ->where('user_id', auth()->user()->id)
            ->withPivot('watched')
            ->using('App\Watchlist');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
