<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Support\Facades\DB;

class users_controller extends Controller
{
    /**
     * 注册
     */
    public function sign(Request $request){
        $username = $request["username"];
        $password = $request["password"];
        $phone = $request["phone"];
        $face_url = $request["face_url"];
        $userinfo = users::query()->where("phone","=",$phone)->get();
        $message;
        if($userinfo->count()>0){
            $message = response()->json([
                "code"=>"1",
                "message"=>"手机号已经注册！",
            ]);
        }else{
            $new_users = new users();
            $new_users->username = $username;
            $new_users->password = $password;
            $new_users->phone = $phone;
            $new_users->face_url = $face_url;
            $count = $new_users->save();
            $message = response()->json([
                "code"=>"2",
                "message"=>"注册成功！",
            ]);
        }
        return $message;
    }

    /**
     * @param Request $request
     * 登录
     */
    public function login(Request $request){
        $username = $request["username"];
        $password = $request["password"];
        $userinfos = users::query()->where("username","=",$username)->where("password","=",
            $password)->get();
        //用户名密码不存在
        $count= $userinfos->count();
        //用户名不存在
        $count_username = users::query()->where("username","=",$username)->count();

        $message;

        if($username==""||$password==""){
            $message=response()->json([
                "code"=>"1",
                "message"=>"用户或密码不能为空！"
            ]);
        }else if($count_username<1){
            $message=response()->json([
                "code"=>"2",
                "message"=>"用户名不存在！"
            ]);
        }else if($count<1){
            $message=response()->json([
                "code"=>"3",
                "message"=>"密码不正错"
            ]);
        }else{
            $message=response()->json([
                "code"=>"4",
                "message"=>"恭喜你，登录成功！",
                [
                    "id"=>$userinfos[0]->id,
                    "username"=>$userinfos[0]->username,
                    "password"=>$userinfos[0]->password,
                    "face_url"=>$userinfos[0]->face_url,
                ]
            ]);
        }
        return $message;
    }

}
