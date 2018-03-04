<?php
class MController{
    private $dsn="mysql:host=localhost; dbname=wmqmessage ";
    private $username="root";
    private $password="root";
    public static $pdo;
    function __construct(){
        if (is_null(self::$pdo)){
            try{
                self::$pdo=new PDO($this->dsn,$this->username,$this->password);
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }
    //  查询
    public function  query_sql($sql){
        try{
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           $result=self::$pdo->query($sql);
            $row=$result->fetchAll(PDO::Fetch_ASSOC);
            return $row;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function delete_sql($table,$id){
        try{
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo-exec("DELETE FROM {$table} WHERE id={$id}" );
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function add($table,$arr){
        try{
            $key=implode(",",array_keys($arr));
            $values="'".implode("'.'",$arr)."'";
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo-exec(" INSERT INTO {$table} ($key) VALUES {$values}");
            return $result;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function update($table,$arr,$id){
        try{
            $sql="";
            foreach($arr as $k=>$v){
               $sql.=","."$k='$v'";
            }
            $sql=substr($sql,1);
            self::$pdo->query("SET NAMES UTF8");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result=self::$pdo-exec("UPDATE {$table} SET {$sql}WHERE id={$id}");
            return $result;

        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}