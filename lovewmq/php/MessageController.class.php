<?php
include_once "function.php";
class MessageController{
    public function message(){
        if (IS_AJAX){
            $data=$_POST;
//            $data["date"]=date("y-m-d h:i:s");
            $data["date"]=time();
            $release=M()->add("message",$data);
            if ($release){
               ajax_return("200","发布成功",$data["date"]);
            }else{
                ajax_return("403","发布失败",$data["date"]);
            }
        }
    }
//    public function judge(){
//        if (IS_AJAX){
//            $judges=M()->query_sql("SELECT * FROM  message");
//            if (!empty($judges)){
//                ajax_return("200","成功",$judges);
//            }else{
//                ajax_return("403","还没有留言去留言吧","");
//            }
//        }
//    }
//  查询
      public function judge(){
          if (IS_AJAX){
              $result=M()->query_sql("SELECT * FROM message");
              foreach ($result as $k=>$v){
                  $result[$k]["date"]=date("y-m-d h:s:i",$v["date"]);
              }
              if (!$result){
                  ajax_return("403","还没有留言","");
              }else{
                  ajax_return("200","成功",$result);
              }
          }
      }
      //  删除
      public function deleteMessage(){
//      就这样像梦一场 分手应该体面
       $mid=$_POST["mid"];
       $result=M()->delete_sql("message",$mid);
//       p($result);
      if (!$result){
          ajax_return("403","删除失败","");
      }else{
          ajax_return("200","删除成功","");
      }
  }
  //  查询
      public function getOldDate(){
      if (IS_AJAX){
          $mid=$_POST["mids"];
          $result=M()->query_sql("SELECT * FROM  message  WHERE id={$mid}");
          $result=current($result);
          if (!$result){
              ajax_return("403","获取失败","");
          }else{
              ajax_return("200","成功",$result);
          }
      }
  }
      //  更新留言
      public function updateMessage(){
          $data=$_POST;
          $id=array_pop($data);
          $result=M()->update("message",$data,$id);
          if (!$result){
              ajax_return("403","留言没有修改","");
          }else{
              ajax_return("200","修改成功","");
          }
      }
      //  上传数据
    public function send(){
        if (IS_AJAX){
            $mid=$_POST["imgs"];
            $result=M()->query_sql("SELECT * FROM  message  WHERE id={$mid}");
            $result=current($result);
            if (!$result){
                ajax_return("403","获取失败","");
            }else{
                ajax_return("200","成功",$result);
            }
        }
    }
    public function fb(){
        if (IS_AJAX){
            $data=$_POST;
            $data["date"]=time();
            $release=M()->add("message",$data);
            if ($release){
                ajax_return("200","发布成功",$data["date"]);
            }else{
                ajax_return("403","发布失败",$data["date"]);
            }
        }
    }
}