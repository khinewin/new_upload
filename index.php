<?php
include "frontend_config.php";
$posts=new FrontEnd();
$ps=$posts->getPostForSlide();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"?>

<div class="container">

   <div class="row">
       <div>
           <?php include "menu.php"; ?>
           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px;">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                   <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                   <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                   <li data-target="#carousel-example-generic" data-slide-to="2"></li>
               </ol>

               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                   <div class="item active">
                       <img src="logo.jpg" alt="..." style="height: 300px">
                       <div class="carousel-caption" style="background: rgba(100, 100,100, 0.2); border-radius: 50px;">
                           <h1>Our Shopping</h1>
                           <p>Men & Lady</p>
                       </div>
                   </div>

                   <?php
                   foreach ($ps as $p){
                       ?>
                       <div class="item">
                           <img style="height: 300px;" src="images/<?php echo $p['p_image'] ?>" alt="...">
                           <div class="carousel-caption" style="background: rgba(100, 100,100, 0.2); border-radius: 50px;">
                               <h1><?php echo $p['p_name'] ?></h1>
                               <p><?php echo $p['price'] ?> MMK</p>
                           </div>
                       </div>
                       <?php
                   }
                   ?>



               </div>

               <!-- Controls -->
               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
               </a>
           </div>
           <?php
           if($_GET['cat_id']){
               $cat_id=$_GET['cat_id'];
               $myPosts=$posts->getPostByCategory($cat_id);
           }elseif($_GET['q']){
               $q=$_GET['q'];
               $myPosts=$posts->getSearchProduct($q);

           }else{
               $myPosts=$posts->getAllProduct();
           }

           foreach ($myPosts as $myP){
               ?>
               <div class="col-sm-4 col-md-3">
                   <div class="thumbnail">
                       <img src="images/<?php echo $myP['p_image'] ?>" class="img-responsive">
                       <h4 class="text-center text-info"><?php echo $myP['p_name'] ?></h4>
                       <p class="text-center"><?php echo $myP['price'] ?> MMK</p>
                       <a href="add-cart.php?id=<?php echo $myP['id'] ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Add Cart</a>
                   </div>
               </div>
               <?php
           }
           ?>

       </div>
   </div>
</div>

<div class="panel-footer">
    <div class="text-center" style="padding: 50px;">&copy; My sites shopping. <?php echo date("Y") ?></div>
</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
<script>
    $(function () {
        $('.carousel').carousel()
    })
</script>
</body>
</html>