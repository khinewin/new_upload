<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['id']);
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
header("location: login.php");