@extends('app')

@section('content')
    @include('editor::head')
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                <form action="/discussion" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="">标题</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">内容</label>
                            <textarea name="body" id="myEditor" cols="25" rows="10" class="form-control"></textarea>

                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary pull-right" value="发表帖子">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop