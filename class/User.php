<?php
class User{
    public $Id,$UserName,$Password,$Name,$Email,$Address,$Admin;
    public function __construct($Id=0,$UserName="",$Password="",$Name="",$Email="",$Address="",$Admin=0){
        $this->Id=$Id;
        $this->UserName=$UserName;
        $this->Password=$Password;
        $this->Name=$Name;
        $this->Email=$Email;
        $this->Address=$Address;
        $this->Admin=$Admin;
    }
    public static function getUsers($sql){
        global $pdo;
        $user=$pdo->query($sql);
        $arrUser=array();	
        foreach($user->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $user=new User();
            foreach($row as $key=>$pro){
                $user->{$key}=$row[$key];
            }
            $arrUser[]=$user;
        }
        return $arrUser;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `user` where Id=$id";
        $user=new User();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $user->{$key}=$row[$key];
        }
        return $user;
    }
    public static function insert($UserName, $Password, $Name, $Email, $Address, $Admin){
        global $pdo;
        $sql="INSERT INTO `user`(`UserName`, `Password`, `Name`, `Email`, `Address`, `Admin`) 
        VALUES (?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$UserName, $Password, $Name, $Email, $Address, $Admin]);
    }
    public static function update($Name, $Email, $Address,$Id){
        global $pdo;
        $sql="UPDATE `user` SET `Name`=?,
        `Email`=?,`Address`=? WHERE `Id`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Name, $Email, $Address,$Id]);
    }
    public static function updatePassword($pass,$Id){
        global $pdo;
        $sql="UPDATE `user` SET `Password`=? WHERE `Id`=?";
        $stmt = $pdo->prepare($sql);
        echo $pass;
        $stmt->execute([$pass,$Id]);
    }
    public static function delete($Id){
        global $pdo;
        $sql="DELETE FROM `user` WHERE Id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Id]);
    }
}
