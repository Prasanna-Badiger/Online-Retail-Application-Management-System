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
    <title>Cart_Details</title>
    <!--css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
    .cart_img
{
    width: 80px;
    height: 50px;
    object-fit: contain;
}
</style>

</head>
<body >

<!--<body background="https://wallpaperaccess.com/full/2593107.jpg">-->
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
          <a class="nav-link" href="./contact.php">Contact</a>  <!--chaged-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart<i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>  <!--chaged-->
        </li>
        
      </ul>

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
      <a class='nav-link' href='#'>Welcome".$_SESSION['username']."</a>  <!--chaged-->
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

<?php
    cart();
?>

<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            <!-- <thead>
                <tr>
                    <th>Product_title</th>
                    <th>Product_image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                
                </tr>
            </thead> -->
            <tbody>

            <!--Dynamic Data-->
            <?php
                global $con;
                $get_ip_add = getIPAddress();
                $total = 0;
                $cart_query = "select * from cart_details where ip_address='$get_ip_add'";
                $result_query = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result_query);
               if($result_count>0)
               {
              echo "  <thead>
                  <tr>
                      <th>Product_title</th>
                      <th>Product_image</th>
                     <!--  <th>Quantity</th>-->
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th colspan='2'>Operations</th>
                  
                  </tr>
              </thead>";


              while ($row = mysqli_fetch_array($result_query)) {
                $product_id = $row['product_id'];
                $select_products = "Select * from products where product_id='$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image = $row_product_price['product_image'];
                  $product_values = array_sum($product_price);

                  $total += $product_values;


                  ?>


                <tr>
                <td><?php echo $product_title ?> </td>
                <td><img src="./images/<?php echo $product_image ?>" alt="" class="cart_img"></td>
               <!-- <td><input type="text" name="qty" class=" form-input w-50"></td>-->
                <!-- <?php
              //  $get_ip_add = getIPAddress();
                // if(isset($_POST['update_cart']))
                // {
                // $quantities =$_POST['qty'];
                // $update_cart = "update cart_details set quantity=$quantities  where  ip_address='$get_ip_add'"; 
                // $result_query= mysqli_query($con,$update_cart);
                // $total = $total * $quantities;
                // }
                ?> -->
                <td><?php echo $price_table ?></td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                <td>
                  <!--<input type="submit" value="Update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">-->
                    <!--<button class="bg-info px-3 py-2 border-0 mx-3">Update</button>-->
                    <input type="submit" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    <!--<button class="bg-info px-3 py-2 border-0 mx-3">Remove</button>-->
                </td>
</tr>
<?php
     }} }
     else
     {
              echo " <h2 class='text-center text-danger' >Cart is empty</h2>";
     }
?>
            </tbody>
        </table>
        <div class="d-flex mb-5">
          <?php
              global $con;
              $get_ip_add = getIPAddress();
             //$total = 0;
              $cart_query = "select * from cart_details where ip_address='$get_ip_add'";
              $result_query = mysqli_query($con, $cart_query);
              $result_count = mysqli_num_rows($result_query);
             if($result_count>0)
             {
            echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total/-</strong></h4>
                 
                  <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                  <button class='bg-secondary p-3 py-2 border-0 '><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                 
             }
             else
             {
        //    echo "<a href='index.php'><button class='bg-info px-3 py-2 border-0'>Continue Shopping</button></a>";
            echo " <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
             }
             if(isset($_POST['continue_shopping']))
             {
            echo "<script>window.open('index.php','_self')</script>";
             }
             
             ?>
           
        </div>
    </div>
</div>
 </form>

 <!--remove item-->
 <?php
 function remove_cart_item()
 {
   global $con;
   if(isset($_POST['remove_cart']))
   {
     foreach($_POST['removeitem'] as $remove_id)
     {
       echo $remove_id;
       $delete_query = "delete from cart_details where product_id= $remove_id";
       $run_delete = mysqli_query($con, $delete_query);
       if($run_delete)
       {
         echo "<script>window.open('cart.php','_self')</script>";
       }
     }
   }
 }
 echo $remove_item= remove_cart_item();
?>
<!--last-->
<!--<div class="bg-info p-3 text-center">
   <p>© Can Stock Photo Inc.</p> 
</div>-->
    </dev>

<!--js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html> 
<body>

