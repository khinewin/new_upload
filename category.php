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
    <title>Store | Category</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?php
            if(isset($_SESSION['info'])):
                ?>
            <div class="alert alert-success"><?php echo $_SESSION['info'] ?></div>
            <?php
            endif;
            unset($_SESSION['info'])
            ?>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-plus-sign"></span> New Category</div>
                <div class="panel-body">
                    <form method="post" action="post_category.php">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input required type="text" name="category_name" id="category_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> Available Category</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <td>ID</td>
                            <td>Category Name</td>
                            <td>Actions</td>
                        </tr>
                        <?php
                        include "config.php";
                        $products=new Product();
                        $cats=$products->getCategory();
                        foreach ($cats as $cat):
                            ?>
                        <tr>
                            <td><?php echo $cat['id'] ?></td>
                            <td><?php echo $cat['category_name'] ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#e<?php echo $cat['id'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                <div id="e<?php echo $cat['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <form action="update_category.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $cat['id'] ?>">
                                                <div class="modal-header">
                                                    Update Category
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="category_name">Category Name</label>
                                                        <input value="<?php echo $cat['category_name'] ?>" type="text" name="category_name" id="category_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
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
        </div>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
<script>
    $(function () {
        setTimeout(function () {
            $(".alert").fadeOut();
        }, 2000)

    })
</script>
</body>
</html>