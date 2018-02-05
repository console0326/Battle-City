<?php
class ModelController{
    private $dsn="mysql:host=localhost;dbname=bw";
    private $username="root";
    private $password="root";
    public static $pdo;
    //构造函数初始化$pdo
    function __construct(){
        if(is_null(self::$pdo)){
            try{
                self::$pdo=new Pdo($this->dsn,$this->username,$this->password);
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }
    //查询方法
    public function query_sql($sql){
        try{
            //设置字符集
            self::$pdo->query("SET NAMES UTF8");
            //设置抛出异常
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo->query($sql);
            $row=$result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    //删除方法
    public function delete_sql($table,$id){
        try{
            //设置字符集
            self::$pdo->query("SET NAMES UTF8");
            //设置抛出异常
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo->exec("DELETE FROM {$table} WHERE id={$id}");
            return $result;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    //增加方法
    public function add($table,$data){
        try{
            //$_POST;
//            $data=array(
//                "username"=>"nz",
//                "password"=>"123"
//            );
            //username,password
            //'nz','123'
            $keys=implode(",",array_keys($data));
            $values="'".implode("','",$data)."'";
//            die($values);
            //INSERT INTO student($keys),VALUES ($values)
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo->exec("INSERT INTO {$table}({$keys}) VALUES({$values})");
            return $result;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    //更新方法：
    public function update($table,$data,$id){
        try{
            # 将要更新的数据转变成字符集；
            $sql="";
            foreach ($data as $k=>$v){
                $sql.=",$k='$v'";
            }
            # 将最开头的【逗号去掉】;
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
