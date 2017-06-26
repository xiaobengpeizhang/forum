<!DOTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel App</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/"><span class="glyphicon glyphicon-home"></span> 首页</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(\Illuminate\Support\Facades\Auth::user())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 17px">{{ \Illuminate\Support\Facades\Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" >
                            <li><a href="/user/avatar"><span class="glyphicon glyphicon-user"></span> 更换头像</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-king"></span> 更改密码</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-heart"></span> 特别感谢</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout"><span class="glyphicon glyphicon-log-out"> 退出登录</span></a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                    <li><a href="/register"><span class="glyphicon glyphicon-exclamation-sign"></span> 注册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
@yield('content')
{{--@include('footer')--}}
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>