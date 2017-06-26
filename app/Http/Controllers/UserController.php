<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function avatar(){
        return view('user.avatar');
    }

    public function update(Request $request){
        $avatar = $request->file('avatar'); //取得用户上传的图片
        $avatarFolder = 'avatars/';            //定义存放的文件夹
        $avatarName = Auth::user()->id.'_'.$avatar->getClientOriginalName();  //获得头像名称
        $avatar->move($avatarFolder,$avatarName); //移动文件存储到本地avatars文件夹

        //对头像进行裁剪
        Image::make($avatarFolder.$avatarName)->fit(200)->save();
        //更新用户头像信息
        $user = User::findOrFail(Auth::user()->id);
        $user->avatar = '/'.$avatarFolder.$avatarName;
        $user->save();

        return redirect('user/avatar');

    }
}
