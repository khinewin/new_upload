<?php
$totalQty=0;
if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $id=>$qty){
        $totalQty +=$qty;
    }
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="color: orangered"><span class="glyphicon glyphicon-shopping-cart"> Store</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="shopping-cart.php">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span class="badge"><?php echo $totalQty ?></span>

                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();
                if(isset($_SESSION['login'])){
                    ?>
                    <li><a href="dashboard.php"> <span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <?php

                    if(isset($_SESSION['admin'])){
                        ?>
                        <li><a href="orders.php"><span class="glyphicon glyphicon-sort-by-order"></span> Orders</a></li>
                        <li><a href="product.php"> <span class="glyphicon glyphicon-cloud"></span> Products</a></li>
                        <li><a href="category.php"><span class="glyphicon glyphicon-list-alt"></span> Category</a></li>
                        <li><a href="users.php"><span class="glyphicon glyphicon-magnet"></span> Users</a></li>
                        <?php

                    }
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['login'] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                    <?php
                }else{
                    ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                    <?php
                }


                ?>



            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>