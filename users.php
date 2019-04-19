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
    <link href="bst/css/bootstrap_dataTable.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
        <h3><span class="glyphicon glyphicon-magnet"></span> Available Users</h3>

        <table class="table table-hover" id="userTable">
            <thead>
            <tr style="background: gainsboro">
                <td>User ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Join Date</td>
                <td>Actions</td>
            </tr>
            </thead>
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
                    <?php if(!$u['role']){
                        ?>
                        <a href="#" data-toggle="modal" data-target="#d<?php echo $u['id'] ?>" class="text-danger" title="Remove user account."><span class="glyphicon glyphicon-trash"></span></a>

                        <?php
                    } ?>


                    <div id="d<?php echo $u['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Confirm
                                </div>
                                <div class="modal-body text-center text-warning">
                                    <span class="glyphicon glyphicon-alert"></span>
                                    <div>
                                        Are you sure want to remove this user <b><?php echo $u['name'] ?></b> ?
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <a href="remove_user.php?id=<?php echo $u['id'] ?>" class="btn btn-primary">Agree</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script src="bst/js/jquery_dataTable.js"></script>
<script src="bst/js/bootstrap_dataTable.js"></script>
<script>
    $(function () {
        $("#userTable").dataTable();
    })
</script>
</body>
</html>