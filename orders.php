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
    <title>Store | Orders</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
        <?php
        $orders=$posts->getOrders();
        foreach ($orders as $o){
            ?>

            <div class="panel panel-default">
                <div class="panel-heading">Order ID : <?php echo $o['id'] ?></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4" style="border-right: 2px solid; ">
                            <p>Customer : <?php echo $o['name'] ?></p>
                            <p>Email : <?php echo $o['email'] ?></p>
                            <p>Phone : <?php echo $o['phone'] ?></p>
                            <p>Address : <?php echo $o['address'] ?></p>
                            <p>Order Date : <?php echo date('D m Y : h i A', strtotime($o['order_at'])) ?></p>
                        </div>
                        <div class="col-sm-8">
                            <table class="table">
                                <tr>
                                    <td>Item Name</td>
                                    <td>Price</td>
                                    <td>Qty</td>
                                    <td>Amount</td>
                                </tr>
                                <?php
                                $totalAmount=0;
                                $orderItems=$posts->getOrderItems($o['id']);
                                foreach ($orderItems as $oi){
                                    $totalAmount +=$oi['qty'] * $oi['price'];
                                    ?>
                                    <tr>
                                        <td><?php echo $oi['item_name'] ?></td>
                                        <td><?php echo $oi['price'] ?></td>
                                        <td><?php echo $oi['qty'] ?></td>
                                        <td><?php echo $oi['qty'] * $oi['price'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right">Total Amount</td>
                                    <td><?php echo $totalAmount; ?></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <a target="_blank" href="print.php?id=<?php echo $o['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></a>
                    </div>
                </div>
            </div>

            <?php
        }

        ?>
    </div>
</div>



<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
<script>

</script>
</body>
</html>