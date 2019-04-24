<?php
session_start();
include "auth.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store | Dashboard</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">
    <div class="row">
       <div class="col-sm-6">
           <div class="panel panel-primary">
               <div class="panel-body">
                   <h3>Products <span class="glyphicon glyphicon-cloud pull-right"></span></h3>
                   <a href="product.php">More >></a>
               </div>
           </div>
       </div>
        <div class="col-sm-6">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <h3>Categories <span class="glyphicon glyphicon-list pull-right"></span></h3>
                    <a href="category.php">More >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-danger">
                <div class="panel-body">
                    <h3>Orders<span class="glyphicon glyphicon-sort-by-order pull-right"></span></h3>
                    <a href="orders.php">More >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3>Users <span class="glyphicon glyphicon-magnet pull-right"></span></h3>
                    <a href="users.php">More >></a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>