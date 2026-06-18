<?php
namespace Repository;
use config\connection;
class AuthRepo{
    private $connection;
    function __construct(){
        $this->connection = connection::getConnection();
    }
    function connectAcc($email,$password){
        try {
            $sql="SELECT * FROM users WHERE email=? AND password=?";
            $stm=$this->connection->prepare($sql);
            $stm->execute([$email,$password]);
            $res=$stm->fetch();
            if($res){
                return $res;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}