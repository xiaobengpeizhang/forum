<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    //帖子首页
    public function index(){
        $discussions = Discussion::all();
        return view('forum.index',compact('discussions'));
    }

    //展示每个帖子页面详情
    public function show($id){
        $discussion = Discussion::findOrFail($id);
        return view('forum.show',compact('discussion'));
    }
}
