<?php
include "user_config.php";

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

$user=new User();
$user->register($name, $email, $password, $confirm_password);