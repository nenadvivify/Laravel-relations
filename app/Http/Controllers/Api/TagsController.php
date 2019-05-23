<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return Tag::with(['posts', 'movies'])->get();
    }

    public function show($id)
    {
        return Tag::find($id)->load(['posts', 'movies']);
    }
}
