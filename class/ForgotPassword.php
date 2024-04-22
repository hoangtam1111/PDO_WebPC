<?php
class ForgotPassword{
    public $customer_id,$token,$created_at;
    public function __construct($customer_id=0,$token="",$created_at=""){
        $this->customer_id=$customer_id;
        $this->token=$token;
        $this->created_at=$created_at;
    }
    public static function getForgot($sql){
        global $pdo;
        $forgot=$pdo->query($sql);
        $arrForgot=array();
        foreach($forgot->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $forgot=new ForgotPassword();
            foreach($row as $key=>$pro){
                $forgot->{$key}=$row[$key];
            }
            $arrForgot[]=$forgot;
        }
        return $arrForgot;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `forgot_password` where customer_id=$id";
        $forgot=new ForgotPassword();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $forgot->{$key}=$row[$key];
        }
        return $forgot;
    }
    public static function insert($id,$token){
        global $pdo;
        $sql="INSERT INTO `forgot_password`(`customer_id`, `token`)
        VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id,$token]);
    }
   
    public static function delete($id){
        global $pdo;
        $sql="DELETE FROM `forgot_password` WHERE customer_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }
    public static function deleteWithToken($token){
        global $pdo;
        $sql="DELETE FROM `forgot_password` WHERE token=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token]);
    }

}