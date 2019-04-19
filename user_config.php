<?php
session_start();
class User{
    public $db;
    public function __construct()
    {
        try{
            $this->db=new PDO('mysql:host=localhost; dbname=mlm_store', 'root', 'p@ssw0rd');

        }catch (PDOException $e){
            die("Connection failed to database server.");
        }
    }
    public function getAllUsers(){
        $sql="select * from users order by id desc";
        return $this->db->query($sql);
    }
    public function getProfile(){
        $id=$_SESSION['id'];
        $sql="select * from users where id='$id'";
        return $this->db->query($sql);
    }
    public function login($email, $password){
        $old_sql="select * from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(!empty($old_row)){
            $enc_password=md5($password);
            $db_password=$old_row['password'];

            if($enc_password==$db_password){
                if($old_row['role']){
                    $_SESSION['admin']=true;
                }
                $name=$old_row['name'];
                $_SESSION['login']=$name;
                $_SESSION['id']=$old_row['id'];
                header("location: dashboard.php");

            }else{
                $_SESSION['err']="The selected password is invalid.";
                header("location: login.php");
            }

        }else{
            $_SESSION['err']="The selected email was not found.";
            header("location: login.php");
        }

    }

    public function register($name, $email, $password, $confirm_password){
        $old_sql="select email from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($old_row)){

            if($password==$confirm_password){
                $enc_password=md5($password);
                $sql="insert into users (name, email, password , created_at)
                      values ('$name', '$email', '$enc_password', now())";
                $rerult=$this->db->query($sql);

                if(!$rerult){
                    $_SESSION['err']="The user account created failed.";
                    header("location: register.php");
                }else{
                    $_SESSION['info']="The user account have been created.";
                    header("location: register.php");
                }


            }else{
                $_SESSION['err']="The password and confirm password must match.";
                header("location: register.php");
            }

        }else{
            $_SESSION['err']="The email is already in use.";
            header("location: register.php");
        }
    }
}