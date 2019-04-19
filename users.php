<?php
session_start();
if(isset($_SESSION['login'])){

    if(!isset($_SESSION['admin'])){
        header("location: dashboard.php");
        exit();
    }

}else{
    header("location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | User Management</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
        <h3><span class="glyphicon glyphicon-magnet"></span> Available Users</h3>

        <table class="table table-hover">
            <tr style="background: gainsboro">
                <td>User ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Join Date</td>
                <td>Actions</td>
            </tr>
            <?php
            include 'user_config.php';
            $users=new User();
            $user=$users->getAllUsers();
            foreach ($user as $u):
                ?>
            <tr>
                <td><?php echo $u['id'] ?></td>
                <td><?php echo $u['name'] ?></td>
                <td><?php echo $u['email'] ?></td>
                <td><?php  if($u['role']){ echo "Administrator"; } else { echo "Standard";} ?></td>
                <td><?php echo date("d-m-Y h:i A", strtotime($u['created_at'])) ?></td>
                <td>
                    <a href="#" title="Reset user account password."><span class="glyphicon glyphicon-refresh"></span></a>
                    <a href="#" class="text-danger" title="Remove user account."><span class="glyphicon glyphicon-trash"></span></a>
                </td>

            </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>