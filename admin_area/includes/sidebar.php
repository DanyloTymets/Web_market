<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span> 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Page</a> 
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i></i> <?php echo $admin_name;  ?><b class="caret"></b> 
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"></i> Profile 
                    </a> 
                </li> 
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i> Products 
                        <span class="badge"><?php echo $count_products; ?></span> 
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-users"></i> Customeres 
                        <span class="badge"><?php echo $count_customers; ?></span> 
                    </a>
                </li>
                <li>
                    <a href="index.php?view_cats">
                        <i class="fa fa-fw fa-archive"></i> Product Categories 
                        <span class="badge"><?php echo $count_p_categories; ?></span> 
                    </a>
                </li>
                <li class="divider"></li> 
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out  
                    </a> 
                </li>  
            </ul> 
        </li> 
    </ul> 
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-th-list"></i> Dashboard 
                </a> 
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-user "></i> Users
                    <i class="fa fa-fw fa-caret-down"></i>     
                </a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> Insert User </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> View Users </a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit User Profile </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a>
            </li> 
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        <i class="fa fa-fw fa-tag"></i> Products 
                        <i class="fa fa-fw fa-caret-down"></i> 
                </a>
                <ul id="products" class="collapse"> 
                    <li> 
                        <a href="index.php?insert_product"> Insert Product </a>
                    </li> 
                    <li> 
                        <a href="index.php?view_products"> View Products </a>
                    </li> 
                </ul> 
             </li> 
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                        <i class="fa fa-fw fa-archive"></i> Products Categories
                        <i class="fa fa-fw fa-caret-down"></i>     
                </a> 
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat"> Insert Product Category </a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats"> View Products Categories </a>
                    </li>
                </ul> 
            </li> 
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat"> 
                        <i class="fa fa-fw fa-archive"></i> Customer Categories
                        <i class="fa fa-fw fa-caret-down"></i> 
                </a> 
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat"> Insert Category </a>
                    </li>
                    <li>
                        <a href="index.php?view_cats"> View Categories </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>  
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide"> Insert Slide </a>
                    </li>
                    <li>
                        <a href="index.php?view_slides"> View Slides </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>
        </ul>
    </div>
</nav>

<?php } ?>