<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | Signup</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php
            session_start();
            if(isset($_SESSION['err'])){
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err'] ?></div>
                <?php

            }
            unset($_SESSION['err']);
            ?>
            <?php

            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['info'] ?></div>
                <?php

            }
            unset($_SESSION['info']);
            ?>


            <h3 class="text-center" style="color: orangered">Signup Account for  Store</h3>
            <form method="post" action="post_register.php">
                <div class="form-group">
                    <label for="name" class="control-label">Username</label>
                    <input type="text" required name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="control-label">Confirm Password </label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Signup</button>
                </div>
            </form>
            Already have an account ? <a href="login.php">Signin</a>
        </div>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>