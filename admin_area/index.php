<?php 

    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TD Shop Admin Page</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head> 
    <div id="wrapper"> 
       <?php include("includes/sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                    if(isset($_GET['dashboard'])){ 
                        include("dashboard.php"); 
                    }
                ?>
            </div>
        </div>
    </div>
<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>
<?php } ?>