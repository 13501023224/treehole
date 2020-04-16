<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use Illuminate\Support\Facades\DB;


class messages_controller extends Controller
{
    //

    //'user_id','content','likes'
    /**
     * @param Request $request
     * 发布树洞的接口
     */
    public  function  publish_tree_hole(Request $request){
        $userid = $request["user_id"];
        $content = $request["content"];
        $likes = $request["likes"];
        $message = new messages();
        $message->user_id = $userid;
        $message->content = $content;
        $message->likes = $likes;
        $status = $message->save();
        $info;
        if($status){
            $info = response()->json([
                "code"=>"1",
                "message"=>"树洞发布成功"
            ]);
        }else{
            $info = response()->json([
                "code"=>"2",
                "message"=>"树洞发布失败"
            ]);
        }
        return $info;
    }

    /**
     * @param Request $request
     * 获取某个树洞
     */
    public function find_treehole_by_userid(Request $request){
        $user_id = $request["user_id"];
        $message = messages::query()->where("user_id","=",$user_id)->get()->toJson();
        return $message;
    }

    /**
     *
     * 获得所有的树洞
     */
    public function  find_all_tree_hole(){
        $messages = messages::query()->get()->toJson();
        return $messages;
    }

    /**
     * @param Request $request
     *给树洞点赞
     */
    public function  like_plus(Request $request){
        $id = $request["id"];
        $message =  messages::query()->where("id","=",$id)->get()->first();
        $message->likes =$message->likes+1;
        $code = $message->save();
        $result;
        if($code){
            $result = response()->json([
                "code"=>"1",
                "message"=>"点赞成功！"
            ]);
        }else{
            $result = response()->json([
                "code"=>"2",
                "message"=>"点赞失败！"
            ]);
        }
        return $result;
    }
    /**
     * @param Request $request
     * 删除指定的树洞
     */
    public function delete_hole_by_id(Request $request){
        $id = $request["id"];
        $status =  messages::destroy($id); 
        
        $result;
        if($status){
            $result = response()->json([
                "code"=>"1",
                "message"=>"删除成功！"
            ]);
        }else{
            $result = response()->json([
                "code"=>"2",
                "message"=>"删除失败！"
            ]);
        }
        return $result;
    }
}
