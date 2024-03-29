<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body> 
<div class="row">
    <div class="col-lg-12">
        <!--<ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Products 
            </li>
        </ol>-->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-pencil fa-fw"></i> Insert Product
               </h3> 
           </div>
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Title </label>
                      <div class="col-md-6">
                          <input name="product_title" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Category </label>  
                      <div class="col-md-6">
                          <select name="product_cat" class="form-control">
                              <option> Select a Category Product </option> 
                              <?php 
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats); 
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){ 
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title']; 
                                  echo " 
                                  <option value='$p_cat_id'> $p_cat_title </option> 
                                  "; 
                              } 
                              ?> 
                          </select>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Customer Category </label>
                      <div class="col-md-6">
                          <select name="product_cat" class="form-control">
                              <option> Select a Category </option> 
                              <?php
                              $get_cat = "select * from customer_categories";
                              $run_cat = mysqli_query($con,$get_cat); 
                              while ($row_cat=mysqli_fetch_array($run_cat)){ 
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title']; 
                                  echo " 
                                  <option value='$cat_id'> $cat_title </option> 
                                  "; 
                              } 
                              ?> 
                          </select>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Image 1 </label>
                      <div class="col-md-6">
                          <input name="product_img1" type="file" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Price </label>
                      <div class="col-md-6">
                          <input name="product_price" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Keywords </label>
                      <div class="col-md-6">
                          <input name="product_keywords" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Desc </label>
                      <div class="col-md-6">
                          <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>    
                      <div class="col-md-6">
                          <input name="submit" value="Add Product" type="submit" class="btn btn-primary form-control"> 
                      </div>
                   </div>
               </form>
           </div>
        </div>
    </div>
</div>  
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_img1 = $_FILES['product_img1']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    $insert_product = "insert into products (p_cat_id,cat_id,date,product_title,product_img1,product_price,product_keywords,product_desc) values ('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_price','$product_keywords','$product_desc')";
    $run_product = mysqli_query($con,$insert_product);
    if($run_product){
        echo "<script>alert('Product has been added sucessfully')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
    }
}
?>

<?php } ?>