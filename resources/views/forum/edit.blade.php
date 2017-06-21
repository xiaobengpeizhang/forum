@extends('app')

@section('content')
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                <form action="/discussion/{{ $discussion->id }}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('patch') !!}
                    <div class="form-group">
                        <label for="">标题</label>
                        <input name="title" type="text" class="form-control" value="{{ $discussion->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">内容</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $discussion->body }}</textarea>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary pull-right" value="修改帖子">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop