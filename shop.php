<?php
session_start();
include("db.php"); 
include_once("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TD Shop</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body> 
   <div id="top">
       <div class="container">
           <div class="col-md-6 offer">
            <a href="#" class="btn btn-success btn-primary">
                   <?php
                   if(!isset($_SESSION['customer_email'])){
                       echo "Welcome: Guest";
                   }else{
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                   }
                   ?>
               </a>
               <a href="checkout.php" style="color:white"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>
           </div>
           <div class="col-md-6">
               
               <ul class="menu">
                   
                   <li>
                       <a href="cart.php">Check Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">Account</a>
                   </li>
                   <li>
                      <a href="checkout.php">
                     <?php
                     if(!isset($_SESSION['customer_email'])){
                          echo "<a href='checkout.php'> Login </a>";
                         }else{
                          echo " <a href='logout.php'> Log Out </a> ";
                         }
                     ?>
                     </a>
                   </li>
                   <li>
                       <a href="register.php">Register</a>
                   </li> 
               </ul>
           </div>
       </div>
   </div>
   <div id="navbar" class="navbar navbar-default">
       <div class="container">
           <div class="navbar-header">
               <a href="index.php" class="navbar-brand home">
                   <img src="images/Webshop-logo.png" alt="Webshop Logo" class="hidden-xs">
                   <img src="images/Webshop-logo-mobile.png" alt="Webshop Logo Mobile" class="visible-xs"> 
               </a>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i> 
               </button> 
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search"> 
                   <span class="sr-only">Toggle Search</span> 
                   <i class="fa fa-search"></i> 
               </button> 
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               <div class="padding-nav">
                   <ul class="nav navbar-nav left">
                       <li>
                           <a href="index.php">Home</a>
                       </li>
                       <li class="active">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li>
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="contact.php">Contacts</a>
                       </li>
                        <li>
                          <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='checkout.php'>My Account</a>";
                           }else{
                              echo"<a href='customer/account.php?orders'>My Account</a>";
                           }
                           ?>
                       </li> 
                   </ul>
               </div>
               <a href="cart.php" class="btn navbar-btn btn-primary right">
                   <i class="fa fa-shopping-cart"></i> 
                   <span><?php items(); ?> Items in cart </span> 
               </a> 
               <div class="navbar-collapse collapse right">
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle Search</span> 
                       <i class="fa fa-search"></i> 
                   </button>
               </div>
               
               <div class="collapse clearfix" id="search">
                   <form method="get" action="results.php" class="navbar-form">
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required> 
                           <span class="input-group-btn"> 
                           <button type="submit" name="search" value="Search" class="btn btn-primary">
                               <i class="fa fa-search"></i> 
                           </button>
                           </span> 
                       </div>
                   </form>   
               </div>
           </div>
       </div>
       
   </div>
   
   <div id="content">
       <div class="container"> 
           <div class="col-md-3">
           <?php 
            
            include("sidebar.php");
            ?>
               
           </div>
           
           <div class="col-md-9">
               <div id="products" class="row">
                    <?php getProducts(); ?>
               </div>
               <center>
                   <ul class="pagination">
                        <?php getPagination(); ?>
                   </ul>
               </center>
           </div>
           <div id="wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;"></div>
       </div>
   </div>
   
   <?php 
    
    include("footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script>
    
        $(document).ready(function(){
            $('.nav-toggle').click(function(){
                $('.panel-collapse,.collapse-data').slideToggle(700,function(){
                    if($(this).css('display')=='none'){
                        $(".hide-show").html('Show');
                    }else{
                        $(".hide-show").html('Hide');
                    }
                });
            });
            $(function(){
                $.fn.extend({
                    filterTable: function(){
                        return this.each(function(){
                            $(this).on('keyup', function(){
                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');
                                if(search == ''){
                                    rows.show();
                                }else{
                                    rows.each(function(){
                                        var $this = $(this);
                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                    });
                                }
                            });
                        });
                    }
                });
                $('[data-action="filter"][id="dev-table-filter"]').filterTable();
            });
        });
    
    </script>

    <script>
    
        $(document).ready(function(){
            function getProducts(){
                var aInputs = Array();
                var aInputs = $('li').find('.get_p_cat');
                var aKeys = Array();
                var aValues = Array();
                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });
                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';
                    }
                }
                
                var aInputs = Array();
                var aInputs = $('li').find('.get_cat');
                var aKeys = Array();
                var aValues = Array();
                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });

                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'cat[]=' + aKeys[i]+'&';
                    }
                }
                $('#wait').html('<img src="images/load.gif"');
                $.ajax({
                    url:"load.php",
                    method:"POST",
                    data: sPath+'sAction=getProducts',
                    success:function(data){
                        $('#products').html('');
                        $('#products').html(data);
                        $('#wait').empty();
                    }
                });

                $.ajax({
                    url:"load.php",
                    method:"POST",
                    data: sPath+'sAction=getPaginator',
                    success:function(data){
                        $('.pagination').html('');
                        $('.pagination').html(data);
                    }
                });
            }
            
            $('.get_p_cat').click(function(){
                getProducts();
            });
            $('.get_cat').click(function(){
                getProducts();
            });
        });
    
    </script>
    
    
</body>
</html>