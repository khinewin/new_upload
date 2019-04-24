<?php
session_start();
include ('auth.php');
include "user_config.php";
$user=new User();
$u=$user->getProfile()->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | User Profile</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
            <h3><span class="glyphicon glyphicon-user"></span> User Profile</h3>
            <hr>
            <div class="col-sm-4">
                <img src="user.png" class="img-responsive img-thumbnail" style="margin-bottom: 10px;">
                <p>Username: <em><?php echo $u['name'] ?></em></p>
                <p>Email : <em><?php echo $u['email'] ?></em></p>
                <p>Role : <?php if($u['role']){echo "Administrator";} else {echo "Standard";} ?></p>
                <p>Join Date : <em><?php echo date("d-m-Y h:i A", strtotime($u['created_at'])) ?></em></p>
            </div>
        </div>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>