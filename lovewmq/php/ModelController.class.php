<?php
include_once "function.php";
class ModelController{
    private $dsn="mysql:host=localhost; dbname=bw"; //    访问 数据名
    private $username="root";
    private $password="root";
    public static $pdo;
    // 构造函数初始化 $pdo
    function __construct()
    {
        if (is_null(self::$pdo)){
            try{
                self::$pdo=new Pdo($this->dsn,$this->username,$this->password);//访问私有 方法
            }catch (Exception $e){
                die ($e->getMessage());
            }
        }
    }
    // 查询
public function query_sql($sql){
        try{
            self::$pdo->query("SET NAMES UTF8");//  乱码
            // 设置抛出异常
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //   异常报错
            $result=self::$pdo->query($sql);
            $row=$result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    //  删除
    public function delete_sql($table,$id){
        try{
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo->exec("DELETE FROM {$table} WHERE id={$id}");
            return $result;
        }catch (Exception $e){
            die($e->getMessage());
       }
    }
    // 增加
    public function add($table,$arr){
            try{
                $keys=implode(",",array_keys($arr));
                $values="'".implode("','",$arr)."'";
                self::$pdo->query("SET NAMES UTF8");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $result=self::$pdo->exec("INSERT  INTO {$table}({$keys}) VALUES({$values})");
                return $result;
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    //更新
    public  function update($table,$arr,$id){
        try{
//            $arr=array(
//    "username"=>"吴",
//    "password"=>"123"
//);
            $sql="";
            foreach ($arr as $k=>$v){
                $sql.=","."$k='$v'";
            }
            $sql=substr($sql,1);
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo->exec("UPDATE {$table} SET {$sql} WHERE id={$id}");
            return $result;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}
$model=new ModelController;
//p($model->query_sql("SELECT * FROM student"));
//p($model->delete_sql("student",10));
//p($model->add("student",$arr=array(
//    "username"=>"15",
//    "password"=>"123"
//)));
//p($model->update("student",$arr=array(
//    "username"=>"吴",
//    "password"=>"123"
//),6));


