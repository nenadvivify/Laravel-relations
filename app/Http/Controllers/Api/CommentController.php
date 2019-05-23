<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Movie;
use App\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'body' => 'required|string',
            'type' => 'required|string',
            'id' => 'required'
        ]);

        $comment = new Comment([
            'body' => request()->body,
            'commentable_id' => request()->id,
            'commentable_type' => request()->type
        ]);

        if (!request()->parentId) {
            $comment->saveAsRoot();
        } else {
            $parent = Comment::find(request()->parentId);
            $comment->parent()->associate($parent)->save();
        }

        if (request()->type == 'post') {
            $post = Post::find(request()->id);
            return $post->load('comments');
        } elseif (request()->type == 'movie') {
            $movie = Movie::find(request()->id);
            return $movie->load('comments');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Comment::descendantsAndSelf($id)->toTree();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
