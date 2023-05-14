<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <!--css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   
    <link rel="stylesheet" href="../style.css">
    <style>
        .hello{
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute text-center;

        }
        .product_img
        {
            width: 10%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!--nav bar-->
    <div class="container-fluid p=0">
        <!--1-->
        <nav class="navbar navbar-exapnd-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="Hello" class="logo">
                <nav class="navbar navbar-exapnd-lg ">
                    <ul calss="navbar-nav">
                        <li class="nav-item">
                            <a href="" calss="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!--2-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!--3-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div calss="p-5">
                <a href="#"><img src="../images/admin.png" alt="hello" class="hello"></a>
                <p class="text-light text-center"> Prasanna </p>
            </div>
            <div class="button text-center">
                 <button><a href="admin_login.php" class="nav-link text-light bg-info my-1">Login</a></button>
                <button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View categories</a></button>
                <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
              <!--  <button><a href="index.php?list_payme" class="nav-link text-light bg-info my-1">All payments</a></button>-->
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                <button><a href="index.php?logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>
            </div>
        </div>



        <!--4-->
        <div class="conatiner my-3">
            <?php

                if(isset($_GET['insert_categories']))
                {
                include('insert_categories.php');
                }

                if(isset($_GET['insert_brands']))
                {
                include('insert_brands.php');
                }
                if(isset($_GET['view_products']))
                {
                include('view_products.php');
                }
                if(isset($_GET['edit_products']))
                {
                include('edit_products.php');
                }
                if(isset($_GET['delete_product']))
                {
                include('delete_product.php');
                }
                if(isset($_GET['view_categories']))
                {
                include('view_categories.php');
                }
                if(isset($_GET['view_brands']))
                {
                include('view_brands.php');
                }
                if(isset($_GET['edit_category']))
                {
                include('edit_category.php');
                }
                if(isset($_GET['delete_category']))
                {
                include('delete_category.php');
                }
                if(isset($_GET['edit_brands']))
                {
                include('edit_brands.php');
                }
                if(isset($_GET['delete_brands']))
                {
                include('delete_brands.php');
                }
                if(isset($_GET['list_orders']))
                {
                include('list_orders.php');
                }
                if(isset($_GET['delete_orders']))
                {
                include('delete_orders.php');
                }
                if(isset($_GET['list_users']))
                {
                include('list_users.php');
                }
                if(isset($_GET['delete_users']))
                {
                include('delete_users.php');
                }
                if(isset($_GET['logout.php']))
                {
                include('logout.php');
                }
            ?>
        </div>
        <!--last-->
<div class="bg-info p-3 text-center footer">
   <p>hello welcome</p> 
</div>
    </div>

<!--js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>