<?php
class MessageController{
           public function sendMessage(){
               if(IS_AJAX){
                   $data=$_POST;
                   $files=$_FILES['photo']['name'];
                   $data["image"]="";
                   for($i=0;$i<count($files);$i++){
                       $target = "../img/";
                       $filename = $target.time().$i.substr($files[$i],strpos($files[$i],"."));
                       $data["image"].=','.$filename;
                       move_uploaded_file($_FILES['photo']['tmp_name'][$i], $filename);
                   }
                   $data["image"]=substr($data["image"],1);
                   $data["date"]=time();
                   $result=M()->add("message",$data);
                   if(!$result){
                       ajax_return("403","发布失败","");
                   }else{
                       ajax_return("200","发布成功","");
                   }
               }
           }
//           $data["date"]=time();
//           $result=M()->add("message",$data);
//           if(!$result){
//               ajax_return("403","发送失败","");
//           }else{
//               ajax_return("200","发布成功","");
//           }


}