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
$id=$_GET['id'];
$p=$products->getProductById($id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | Edit Product</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h3 class="text-center text-primary"><span class="glyphicon glyphicon-edit"></span> Edit Product</h3>

            <form enctype="multipart/form-data" method="post" action="update_product.php">
                <input type="hidden" name="id" value="<?php echo $p['id'] ?>">
                <div class="form-group">
                    <label for="p_image">Image</label>
                    <input  style="height: auto;" type="file" name="p_image" id="p_image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="p_name">Name</label>
                    <input value="<?php echo $p['p_name'] ?>" required type="text" name="p_name" id="p_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Prices</label>
                    <input value="<?php echo $p['price'] ?>" required type="number" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select required name="category_id" id="category_id" class="form-control">
                        <option value="">Select category</option>
                        <?php
                        $cats=$products->getCategory();
                        foreach ($cats as $c){
                            ?>
                            <option <?php if($p['category_id']==$c['id']){ echo "selected"; } ?> value="<?php echo $c['id'] ?>"><?php echo $c['category_name'] ?></option>
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


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>