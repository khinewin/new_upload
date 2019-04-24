<?php
include "frontend_config.php";
$posts=new FrontEnd();
$id=$_GET['id'];

$o=$posts->getOrderOne($id);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | Print</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="text-center">MLM Store</h1>
            <p class="text-center">Mawlamyine, Kyaik Ma Yaw Road.</p>
            <p class="text-center"> 0987236262236</p>
            <div>Order ID : <?php echo $o['id'] ?></div>
            <div>Customer : <?php echo $o['name'] ?></div>
            <div>Order Date : <?php echo date("D m Y : h i A", strtotime($o['order_at'])) ?></div>

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
            Thank you.

        </div>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
<script>

</script>
</body>
</html>