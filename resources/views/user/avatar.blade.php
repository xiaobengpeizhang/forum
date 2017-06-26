@extends('app')

@section('content')
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                     <div class="panel-heading">
                         更改头像
                     </div>
                    <div class="panel-body">
                        <label for="">当前头像</label>
                        <div class="text-center">
                            <img src="{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" alt="用户头像" width="120px" height="120px" class="img-circle">
                        </div>
                        <form action="/user/avatar" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="avatar" accept="image/gif, image/jpeg">
                            <input type="submit" value="上传头像" class="btn btn-success pull-right">
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@stop