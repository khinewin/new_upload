<?php
include ("config.php");

$id=$_POST['id'];
$category_name=$_POST['category_name'];

$p=new Product();
$p->updateCategory($id, $category_name);