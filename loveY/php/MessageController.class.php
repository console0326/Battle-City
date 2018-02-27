<?php
class MessageController{
    public function sendMessage(){
       if(IS_AJAX){
           $data=$_POST;
           $data["date"]=time();
           $result=M()->add("message",$data);
           if(!$result){
               ajax_return("403","发送失败","");
           }else{
               ajax_return("200","发布成功","");
           }
       }
    }
}