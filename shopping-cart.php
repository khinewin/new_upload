<?php
include "frontend_config.php";
$posts=new FrontEnd();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | Shopping Cart</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Shopping Cart</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Item Name</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Amount</td>
                        </tr>
                        <?php
                        $totalAmount=0;
                        if(isset($_SESSION['cart'])){
                            foreach ($_SESSION['cart']as $id=>$qty){
                                $carts=$posts->getProductForShoppingCart($id);
                                foreach ($carts as $c){
                                    $totalAmount +=$qty * $c['price'];
                                    ?>
                                    <tr>
                                        <td><?php echo $c['p_name'] ?></td>
                                        <td><?php echo $c['price'] ?></td>
                                        <td>
                                            <a href="decrease_item.php?id=<?php echo $c['id'] ?>">
                                                <span class="glyphicon glyphicon-minus-sign"></span>
                                            </a>
                                            <?php echo $qty; ?>
                                            <a href="increase_item.php?id=<?php echo $c['id'] ?>">
                                                <span class="glyphicon glyphicon-plus-sign"></span>
                                            </a>

                                        </td>
                                        <td><?php echo $qty * $c['price'] ?></td>
                                    </tr>
                                    <?php
                                }

                            }
                        }
                        ?>
                        <tr>
                            <td colspan="3" class="text-right">Total Amount</td>
                            <td><?php echo $totalAmount ?></td>
                        </tr>

                    </table>
                    <a href="index.php" class="btn btn-primary">Continued Shopping</a>
                    <a href="clear_cart.php" class="btn btn-default"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Fill your infomation.</div>
                <div class="panel-body">
                    <?php
                    if(isset($_SESSION['login'])){
                        ?>

                    <form method="post" action="confirm_order.php">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input required type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" required name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Checkout</button>
                        </div>
                    </form>

                        <?php
                    }else{
                        ?>
                        <div>Please login first. <a href="login.php">Login</a></div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="panel-footer">
    <div class="text-center" style="padding: 50px;">&copy; My sites shopping. <?php echo date("Y") ?></div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
<script>

</script>
</body>
</html>