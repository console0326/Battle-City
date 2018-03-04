<?php
header("content-type:text/html;charset=utf-8");

function p($a){
    echo "<pre/>";
    var_dump($a);
}
// IS_POST 常量
function success($msg,$url){
    $str=<<<str
     <script>
        alert("$msg");
        window.location.href="$url";
     </script>
str;
    die($str);
}
function error($msg,$url){
    $str=<<<str
     <script>
        alert("$msg");
        window.location.href="$url";
     </script>
str;
    die($str);
}
// 判断前台的请求是否为 post
define("IS_POST",$_SERVER["REQUEST_METHOD"]=="POST"?true:false,true);
//  判断前台的请求是否为 ajax
define("IS_AJAX",isset($_SERVER["HTTP_X_REQUESTED_WITH"])&&$_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest"?true:false,true);
function __autoload($classname){
    $classPath="./{$classname}.class.php";
    if (file_exists($classPath)){
        include_once "$classPath";
    }else{
        echo "{$classname}类不存在";
        die;
    }
}
function M(){
    $model=new ModelController;
    return $model;
}
// 返回给前台格式的数据
function ajax_return ($code,$message,$data){
    if (!is_numeric($code)){
        return "";
    }
    $result=array(
       "code"=>$code,
        "message"=>$message,
        "data"=>$data
    );
    die(json_encode($result));
}