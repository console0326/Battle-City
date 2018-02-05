<?php
include_once "function.php";
header("Access-Control-Allow-Origin:*");//允许所有域名访问
$obj=isset($_GET["c"])?$_GET["c"]:"Index";
$obj.="Controller";
$c=new $obj;//相当于如果没有$_GET["c"]，就是new IndexController
$func=isset($_GET["a"])?$_GET["a"]:"index";
$c->$func();