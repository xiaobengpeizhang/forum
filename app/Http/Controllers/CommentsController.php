<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function store(CommentRequest $request){
        Comment::create($request->all());
        return redirect()->action('PostsController@show',['id' => $request->get('discussion_id')]);
    }
}
