<?php
include 'frontend_config.php';

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$f=new FrontEnd();
$f->confirmOrder($name, $email, $phone, $address);

