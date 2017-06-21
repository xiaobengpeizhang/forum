@extends('app')
@section('content')
    <div class="container" style="margin-top: 20px">
         <div class="panel panel-danger">
             <div class="panel-heading">
                 错误信息
             </div>
             <div class="panel-body">
                 {{ $massage }}
             </div>
         </div>
    </div>
@endsection