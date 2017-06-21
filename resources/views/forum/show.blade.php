@extends('app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#"><img src="{{ $discussion->user->avatar }}" alt="用户头像" class="media-object img-circle" style="width: 64px;height: 64px;"></a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                    {{ $discussion->title }}
                    </h4>
                    {{ $discussion->user->name }}
                    @if(\Illuminate\Support\Facades\Auth::check()  &&
                        (\Illuminate\Support\Facades\Auth::user()->id == $discussion->user_id))
                    <a class="btn btn-primary btn-lg pull-right" href="/discussion/{{ $discussion->id }}/edit" role="button">修改帖子</a>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $discussion->title }}</h2>
                    <p class="blog-post-meta">创建于 {{ $discussion->created_at }} 楼主：<a href="#"> {{ $discussion->user->name }}</a></p>
                    {!! htmlspecialchars_decode($html) !!}
                </div>

                <h3>精彩评论</h3>
                @foreach($discussion->comments as $comment)
                    <hr>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="{{ $comment->user->avatar }}" alt="用户头像" style="width: 64px;height: 64px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->user->name }}</h4>
                            <h5>发表时间：{{ $comment->created_at }}</h5>
                            {{ $comment->body }}
                        </div>
                    </div>
                    <hr>
                @endforeach

                @if(\Illuminate\Support\Facades\Auth::check())
                <form action="/comment" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                    <div class="form-group">
                        <label for="body">发表评论</label>
                        <textarea name="body" placeholder="雁过留痕，人过留声..." class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success pull-right" value="确定发表">
                </form>
                @else
                    <a href="/login" class="btn btn-success pull-right">登录发表评论</a>
                @endif
            </div>
        </div>
        <br>
        <button onclick="history.go(-1)" class="btn btn-primary"><span class="glyphicon glyphicon-backward"></span> 返回</button>
    </div>
@endsection