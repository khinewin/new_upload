<?php
session_start();
$id=$_GET['id'];
foreach ($_SESSION['cart'] as $old_id=>$qty){
    if($id==$old_id){

       if($qty<=1){

           if(count($_SESSION['cart']) <=1){
                unset($_SESSION['cart']);
           }else{
               unset($_SESSION['cart'][$id]);
           }

       }else{
          $_SESSION['cart'][$id]--;

       }

    }
}
header("location: shopping-cart.php");