<?php
include ('user_config.php');

$id=$_GET['id'];

$user=new User();
$user->removeUser($id);

