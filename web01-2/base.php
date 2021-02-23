<?php
date_default_timezone_set("Asia/Taipei");
session_start();

$Admin=new DB("admin");
$Ad=new DB("Ad");
$Image=new DB("Image");
$Mvim=new DB("Mvim");
$Menu=new DB("Menu");
$Title=new DB("Title");
$News=new DB("News");
$Bottom=new DB("Bottom");
$Total=new DB("Total");

if(empty($_SESSION['total'])){
    $chk=$Total->find(1);
    print_r($chk);
    $chk['total']++;
    $Total->save($chk);
    $_SESSION['total']=1;
}

class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;dbname=db011;charset=utf8";
    protected $pdo;

    function __construct($table){
        $this->pdo=new PDO($this->dsn,'root','');
        $this->table=$table;
    }
    function all(...$arg){
        $sql="select * from $this->table";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql.=$arg[1];
        }
        return $this->pdo->query($sql)->fetchAll();
    }
    function count(...$arg){
        $sql="select count(*) from $this->table";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql.=$arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($id){
        $sql="select * from $this->table";
        if(isset($id)){
            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=" where id=$id";
            }
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql="delete from $this->table";
        if(isset($id)){
            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=" where id=$id";
            }
        }
        return $this->pdo->exec($sql);
    }
    function save($arr){
        if(isset($arr['id'])){
            foreach($arr as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql="update $this->table set ".implode(",",$tmp)." where id={$arr['id']}";
        }else{
            $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values ('".implode("','",$arr)."')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }
}
function to($url){
    header("location:$url");
}
?>