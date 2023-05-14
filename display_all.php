<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>
<body>
   <!--Nav Bar-->
   <div class="conatainer-fluid p=0">
   <nav class="navbar navbar-expand-lg navbar-light bg-primary"> <!--changed-->
  <div class="container-fluid">
    <img src="./images/logo.png" alt="hello" class="logo">
    <!--<img src="./images/logo2.png" alt="hello" class="logo">-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a> <!--changed-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>  <!--chaged-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>  <!--chaged-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>  <!--chaged-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart<i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>  <!--chaged-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:100/-</a>  <!--chaged-->
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" height="3%" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>
-->
<input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
</form>
    </div>
  </div>
</nav>


<!--22-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary"> <!--changed-->
 <ul calss="navabr-nav me-auto">
 <?php
    if(!isset($_SESSION['username']))
    {
    echo "  <li class=nav-item >
    <a class='nav-link' href='#'>Welcome Guest</a>  <!--chaged-->
        </li>";
    }
    else
    {
    echo "  <li class='nav-item'>
      <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>  <!--chaged-->
    </li> ";
    }

    if(!isset($_SESSION['username']))
    {
    echo "  <li class=nav-item >
    <a class='nav-link' href='./user_area/user_login.php'>Login</a>  <!--chaged-->
        </li>";
    }
    else
    {
      echo "  <li class=nav-item >
      <a class='nav-link' href='./user_area/logout.php'>Logout</a>  <!--chaged-->
          </li>";
    }
  ?>
 </ul>
</nav>
<!--33-->
<div calss="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Welcome To Online Reatil Platform</p>
</div>
<!--44-->
<div class="row">
    <div class="col-md-10">
        <div class="row">
<!--fetching products-->
<?php
 getproducts();
//search_product();
//get_unique_categories();
//get_unique_barnds();
// $select_query="select * from products";
// $result_query = mysqli_query($con, $select_query);
// while($row=mysqli_fetch_assoc($result_query))
// {
//   $product_id=$row['product_id'];
//   $product_title=$row['product_title'];
//   $product_description=$row['product_description'];
//   $product_category=$row['product_category'];
//   $product_brand=$row['product_brand'];
//   $product_price=$row['product_price'];
//   $product_image=$row['product_image'];

//   //echo $product_title;
//   echo "  <div class='col-md-4 mb-2'>
//   <div class='card' >
//       <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
//        <div class='card-body'>
//        <h5 class='card-title'> $product_title</h5>
//       <p class='card-text'>$product_description </p>
//        <a href='#' class='btn btn-primary'>Add to cart</a>
//        <a href='#' class='btn btn-secondary'>View More</a>
//       </div>
//   </div>
// </div>";

//}
?>
   <!--<div class="col-md-4 mb-2">
            <div class="card" >
                <img src="./images/k1.png" class="card-img-top" alt="...">
                 <div class="card-body">
                 <h5 class="card-title">Grains</h5>
                <p class="card-text">A grain is a small,dry fruit,Grains are important sources of many nutrients, B vitamins and minerals  </p>
                 <a href="#" class="btn btn-primary">Add to cart</a>
                 <a href="#" class="btn btn-secondary">View More</a>
                </div>
            </div>
        </div>-->
        
        </div><!--col-->
    </div><!--row-->
    <div class="col-md-2 bg-secondary p-0">

    <!--display brands-->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
        </li>
        <?php
      
      getbrands()
        ?>
       <!-- <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand1</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand2</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand3</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand4</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand5</a>
        </li>-->
    </ul>
    <!--categories-->
    <ul class="navbar-nav me-auto text-center ">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>categories</h4></a>
        </li>

        <?php
        getcategories()
         ?>
      <!--  <li class="nav-item">
          <a href="#" class="nav-link text-light">categories 1</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">categories 2</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">categories 3</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">categories 4</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">categories 5</a>
        </li>-->
    </ul>


    </div>
</div>

<!--last-->
<?php
include("./includes/footer.php");
?>
    </dev>

<!--js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html> 
<body>

