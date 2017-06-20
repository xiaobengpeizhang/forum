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

                    <a class="btn btn-primary btn-lg pull-right" href="#" role="button">修改帖子</a>

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
                    <p>{{ $discussion->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection