<?php
include "config.php";

$p_name=$_POST['p_name'];
$p_image=$_FILES['p_image'];
$price=$_POST['price'];
$category_id=$_POST['category_id'];

$p=new Product();
$p->uploadProduct($p_name, $p_image, $price, $category_id);