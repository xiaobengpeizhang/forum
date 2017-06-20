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

}
