<?php
include "config.php";

$p_name=$_POST['p_name'];
$id=$_POST['id'];
$category_id=$_POST['category_id'];
$price=$_POST['price'];
$p_image=$_FILES['p_image'];

$p=new Product();
$p->updateProduct($id, $p_name, $price, $category_id, $p_image);