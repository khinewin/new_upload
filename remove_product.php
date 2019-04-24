<?php

include "config.php";

$id=$_GET['id'];
$p_image=$_GET['p_image'];
$p=new Product();
$p->removeProduct($id, $p_image);
