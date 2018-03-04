<?php
include_once "function.php";
class LoginController{
    // 注册
    public function register(){
        if (IS_AJAX){
//        p($_SERVER);
//        die;
        $data=$_POST;// 接收前台发送的数据
        $username=$data["username"];
        $password=$data["password"];
        $oldData=M()->query_sql("SELECT * FROM users WHERE username='{$username}'");
//        p($oldData);
        if (!empty($oldData)){
            ajax_return("500","用户名已存在","");
        }else{
            $newPass=$this->verify($password);
//            p($newPass);h
            $data["password"]=$newPass;
            $result=M()->add("users",$data);
            if ($result){
                ajax_return("200","注册成功","");
            }else{
                ajax_return("400","注册失败","");
            }
        }
    }
    }
    public function registers(){
        if (IS_AJAX){
//        p($_SERVER);
//        die;
            $data=$_POST;// 接收前台发送的数据
            $username=$data["username"];
//            $password=$data["password"];
            $oldData=M()->query_sql("SELECT * FROM users WHERE username='{$username}'");
//        p($oldData);
            if (!empty($oldData)){
                ajax_return("500","用户名已存在","");
            }else{
//                $newPass=$this->verify($password);
//            p($newPass);h
//                $data["password"]=$newPass;
                $result=M()->add("users",$data);
                if ($result){
                    ajax_return("200","注册成功","");
                }else{
                    ajax_return("400","注册失败","");
                }
            }
        }
    }
    // 登录
    public  function login(){
       if (IS_AJAX){
          $data=$_POST;
           $username=$data["username"];
           $password=$data["password"];
           $oldDate=M()->query_sql(" SELECT * FROM users WHERE username='{$username}'");
           $oldDate=current($oldDate);
           if (empty($oldDate)){
               ajax_return("500","用户名不存在","");
           }else{
               $newPass=$this->verify($password);
               if ($oldDate["password"]==$newPass){
                   session_start();
                   $_SESSION["username"]=$username;
                   ajax_return("200","登陆成功","");
               }else{
                   ajax_return("403","密码不正确","");
               }
           }
       }
    }
    // 退出登录
    public function logout(){
        if (IS_AJAX){
            session_start();
            session_unset();
            session_destroy();
            ajax_return("200","退出成功","");
        }
    }
    // 加密
    public  function verify($str){
       $md=md5(md5($str)."beijing");
        return $md;
    }
}