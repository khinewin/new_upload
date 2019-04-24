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

include 'config.php';
$products=new Product();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | Products</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
    <link href="bst/css/bootstrap_dataTable.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">New Product</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" method="post" action="post_product.php">
                        <div class="form-group">
                            <label for="p_image">Image</label>
                            <input required style="height: auto;" type="file" name="p_image" id="p_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="p_name">Name</label>
                            <input required type="text" name="p_name" id="p_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Prices</label>
                            <input required type="number" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select required name="category_id" id="category_id" class="form-control">
                                <option value="">Select category</option>
                                <?php
                                $cats=$products->getCategory();
                                foreach ($cats as $c){
                                    ?>
                                    <option value="<?php echo $c['id'] ?>"><?php echo $c['category_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="table-responsive">
            <table class="table table-hover" id="productTable">
                <thead>
                <tr>
                    <td>Images</td>
                    <td>Item Name</td>
                    <td>Prices</td>
                    <td>Category</td>
                    <td>Upload Date</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <?php
                $pds=$products->getProducts();
                foreach ($pds as $p){
                    ?>
                    <tr>
                        <td class="col-sm-2"><img class="img-responsive img-rounded" src="images/<?php echo $p['p_image'] ?>"></td>
                        <td><?php echo $p['p_name'] ?></td>
                        <td><?php echo $p['price'] ?></td>
                        <td><?php echo $p['category_name'] ?></td>
                        <td><?php echo date("D, m, Y :h i A",strtotime($p['created_at'])) ?></td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions <span class="glyphicon glyphicon-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="edit_product.php?id=<?php echo $p['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" data-toggle="modal" data-target="#r<?php echo $p['id'] ?>"><span class="glyphicon glyphicon-trash"></span> Remove</a></li>
                                </ul>
                            </div>


                            <div id="r<?php echo $p['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">Confirm</div>
                                        <div class="modal-body text-center text-warning">
                                            <span class="glyphicon glyphicon-alert"></span>
                                            <div>
                                                Are you sure want to remove this item name <b><?php echo $p['p_name'] ?></b> ?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="remove_product.php?id=<?php echo $p['id'] ?>&p_image=<?php echo $p['p_image'] ?>" class="btn btn-primary">Agree</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            </div>
        </div>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
<script src="bst/js/jquery_dataTable.js"></script>
<script src="bst/js/bootstrap_dataTable.js"></script>
<script>
    $(function () {
        $("#productTable").dataTable();
    })
</script>
</body>
</html>