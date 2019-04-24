<?php
include ("config.php");

$category_name=$_POST['category_name'];

$p=new Product();
$p->newCategory($category_name);

