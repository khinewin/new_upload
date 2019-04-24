<?php

include "user_config.php";

$id=$_POST['user_id'];
$password=$_POST['new_password'];
$confirm_password=$_POST['confirm_new_password'];

$user=new User();
$user->resetUserPassword($id, $password, $confirm_password);