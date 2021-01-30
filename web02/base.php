<?php

date_default_timezone_set("Asia/Taipei");
session_start();

$Mem=new DB("member");
$Total=new DB("total");
$News=new DB("news");

$chk=$Total->find(['date'=>date("Y-m-d")]);

if(empty($_SESSION['total']) && empty($chk)){
    $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
    $_SESSION['total']=1;
}else if(!empty($chk) && empty($_SESSION['total'])){
    $chk['total']++;
    $Total->save($chk);
    $_SESSION['total']=1;
}else if(!empty($_SESSION['total']) && $chk==null){  //異常情形 如清空資料庫但還有session
    $Total->save(["date"=>date("Y-m-d"),"total"=>1]);
}

class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;dbname=db022;charset=utf8";
    protected $pdo;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
    }

    function all(...$arg){
        $sql="select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql .=" where ".implode(" && ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql.= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll();
    }

    function count(...$arg){
        $sql="select count(*) from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql .=" where ".implode(" && ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql.= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id){
        $sql="select * from $this->table ";
        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql.="where ".implode(" && ",$tmp);
        }else{
            $sql.="where `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id){
        $sql="delete from $this->table ";
        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql.="where ".implode(" && ",$tmp);
        }else{
            $sql.="where `id`='$id'";
        }
        return $this->pdo->query($sql);
    }

    function save($arr){
        if(isset($arr['id'])){
            foreach($arr as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql="update $this->table set ".implode(" , ",$tmp)." where `id`='{$arr['id']}'";
        }else{
            $sql= "insert into $this->table (`".implode("`,`",array_keys($arr))."`) values('".implode("','",$arr)."') ";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }
}
function plo($url){
    header("location:".$url);
}

?>