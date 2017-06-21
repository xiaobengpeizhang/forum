<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Markdown\Markdown;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreBlogPostRequest;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    protected $markdown;

    public function __construct(Markdown $markdown)
    {
        //只在创建，修改帖子时验证是否登录
        $this->middleware(
            'auth',
            ['only' => [
                'create','store','edit','update'
            ]]);
        $this->markdown = $markdown;
    }

    //帖子首页
    public function index(){
        $discussions = Discussion::orderBy('id','desc')->simplePaginate(10);
        return view('forum.index',compact('discussions'));
    }

    //展示每个帖子页面详情
    public function show($id){
        $discussion = Discussion::findOrFail($id);
        //转换markdown
        $html = $this->markdown->changeToHtml($discussion->body);
        return view('forum.show',compact('discussion','html'));
    }

    //发表帖子
    public function create(){
        return view('forum.create');
    }

    public function store(StoreBlogPostRequest $request){
        $user = [
            'user_id'=>Auth::user()->id,
            'last_user_id'=>Auth::user()->id,
        ];
        $discussion = Discussion::create(array_merge($user,$request->all()));
        return redirect()->action('PostsController@show',[$id = $discussion->id]);
    }

    //修改帖子
    public function edit($id){
        $discussion = Discussion::findOrFail($id);
        if(Auth::user()->id == $discussion->user_id){
            return view('forum.edit',compact('discussion'));
        }else{
            return view('errors.errormsg')->with('massage','你不可以修改他人的帖子!');
        }
    }

    public function update(StoreBlogPostRequest $request,$id){
        $discussion = Discussion::findOrFail($id);
        $discussion->update($request->all());
        return redirect()->action('PostsController@show',['id' => $discussion->id ]);
    }

}
