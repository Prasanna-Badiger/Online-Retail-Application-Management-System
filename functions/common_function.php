<?php
//include('./includes/connect.php');

function getproducts()
{
    global $con;
    if(!isset($_GET['categories']))
    {
        if (!isset($_GET['brands'])) {

            $select_query = "select * from products order by rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keyword = $row['keyword'];
                $product_category = $row['product_category'];
                $product_brand = $row['product_brand'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];

                //echo $product_title;
                echo "  <div class='col-md-4 mb-2'>
  <div class='card' >
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
       <h5 class='card-title'> $product_title</h5>
      <p class='card-text'>$product_description </p>
      <p class='card-text'>Price :$product_price </p>
       <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
      <!-- <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>-->
      </div>
  </div>
</div>";
            }
        }

}
}

function get_all_products()
{
    global $con;
    if(!isset($_GET['categories']))
    {
        if (!isset($_GET['brands'])) {

            $select_query = "select * from products order by rand() ";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keyword = $row['keyword'];
                $product_category = $row['product_category'];
                $product_brand = $row['product_brand'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];

                //echo $product_title;
                echo "  <div class='col-md-4 mb-2'>
  <div class='card' >
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
       <h5 class='card-title'> $product_title</h5>
      <p class='card-text'>$product_description </p>
      <p class='card-text'>Price :$product_price </p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <!--  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>-->
      </div>
  </div>
</div>";
            }
        }

}
}

function get_unique_categories()
{
    global $con;
    if(isset($_GET['categories']))
    {

        $category_id = $_GET['category'];
            $select_query = "select * from products where category_id= $category_id";
            $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows==0)
        {
            echo "<h2 class='text-center text-danger'>NO STOCK FOR THIS CATEGORY</h2>";
        }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keyword = $row['keyword'];
                $product_category = $row['product_category'];
                $product_brand = $row['product_brand'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];

                //echo $product_title;
                echo "  <div class='col-md-4 mb-2'>
  <div class='card' >
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
       <h5 class='card-title'> $product_title</h5>
      <p class='card-text'>$product_description </p>
      <p class='card-text'>Price :$product_price </p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
      <!-- <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>-->
      </div>
  </div>
</div>";
            }
        }


}

function get_unique_barnds()
{
    global $con;
    if(isset($_GET['brands']))
    {

        $brand_id = $_GET['brand'];
            $select_query = "select * from products where brand_id= $brand_id";
            $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows==0)
        {
            echo "<h2 class='text-center text-danger'>NO STOCK FOR THIS CATEGORY</h2>";
        }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_category = $row['product_category'];
                $product_brand = $row['product_brand'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];

                //echo $product_title;
                echo "  <div class='col-md-4 mb-2'>
  <div class='card' >
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
       <h5 class='card-title'> $product_title</h5>
      <p class='card-text'>$product_description </p>
      <p class='card-text'>Price :$product_price </p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
      <!-- <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>-->
      </div>
  </div>
</div>";
            }
        }


}


function getbrands()
{

    global $con;
    $select_brands = "select * from brands";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data = mysqli_fetch_assoc($resulr_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav_item'>
          <a href='index.php?brand=$brand_id' class='nav_link text_light'>$brand_title</a>
          </li>";
    }
}

function getcategories()
{
    global $con;
    $select_categories = "select * from categories";
    $result_categories = mysqli_query($con, $select_categories);
   // $row_data = mysqli_fetch_assoc($resulr_brands);
  while($row_data=mysqli_fetch_assoc($result_categories))
  {
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      echo "<li class='nav_item'>
      <a href='index.php?category=$category_id' class='nav_link text_light'>$category_title</a>
      </li>";
  }
}


function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from products where keyword like '% $search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows==0)
        {
            echo "<h2 class='text-center text-danger'>NO STOCK FOR THIS CATEGORY</h2>";
        }
        $result_query = mysqli_query($con, $search_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            //  $product_keyword = $row['keyword'];
            $product_category = $row['product_category'];
            $product_brand = $row['product_brand'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];

            //echo $product_title;
            echo "  <div class='col-md-4 mb-2'>
  <div class='card' >
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
       <h5 class='card-title'> $product_title</h5>
      <p class='card-text'>$product_description </p>
      <p class='card-text'>Price :$product_price </p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <!--  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>-->
      </div>
  </div>
</div>";
        }
    }
}


function view_details()
{
    global $con;
    if(isset($_GET['product_id'])){
        if (!isset($_GET['categories'])) {
            if (!isset($_GET['brands'])) {
                $product_id = $_GET['product_id'];
                $select_query = "select * from products where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    //$product_keyword = $row['keyword'];
                    $product_category = $row['product_category'];
                    $product_brand = $row['product_brand'];
                    $product_price = $row['product_price'];
                    $product_image = $row['product_image'];

                    //echo $product_title;
                    echo "  <div class='col-md-4 mb-2'>
  <div class='card' >
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
       <h5 class='card-title'> $product_title</h5>
      <p class='card-text'>$product_description </p>
       <a href='#' class='btn btn-primary'>Add to cart</a>
      <!-- <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>-->
      </div>
  </div>
  <div class='col-md-8'>
  <div class='row'>
      <div class='col-md-12'>
          <h4 class='text-center text-info mb-5'>Related produts</h4>
      </div>
      <div class='col-md-6'>
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>
      </div>
      <div class='col-md-6'>
      <img src='./user-area/product_images/ $product_image' class='card-img-top' alt='$product_title'>  
       </div>
  </div>
</div>";
                }
            }
        }
}

}


function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//add to cart
    function cart()
    {
        if(isset($_GET['add_to_cart']))
        {
        global $con;
        $get_ip_add= getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from cart_details where ip_address='$get_ip_add' and product_id='$get_product_id'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows>0)
        {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else
        {
            $insert_query = "insert into cart_details values('$get_product_id','$get_ip_add',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>('Item is addes to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        }
    }

    function cart_item()
    {
        if(isset($_GET['add_to_cart']))
        {
        global $con;
        $get_ip_add= getIPAddress();
        $select_query = "Select * from cart_details where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        }
        else
        {
            global $con;
            $get_ip_add= getIPAddress();
            $select_query = "Select * from cart_details where ip_address='$get_ip_add'";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
        }
    echo $num_of_rows;
        }


    //total cart 
     function total_cart_price()
     {
    global $con;
    $get_ip_add = getIPAddress();
    $total = 0;
    $cart_query = "select * from cart_details where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con, $cart_query);
    while($row=mysqli_fetch_array($result_query))
    {
        $product_id = $row['product_id'];
        $select_products = "Select * from products where product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products))
         {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total+=$product_values;
        }

    }
    echo $total;

     }

     //order details
     function get_user_order()
     {
    global $con;
    $username = $_SESSION['username'];
    $get_details = "select * from user_table where username='$username'";
    $result_query = mysqli_query( $con,$get_details);
    while( $row_query = mysqli_fetch_array($result_query))
    {
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit-account']))
        {
            if(!isset($_GET['my_orders']))
            {
                if(!isset($_GET['delete_account']))
                {
                    $get_orders = "select * from user_orders where user_id='$user_id'
                                        or order_status='pending'";
                    $result_orders = mysqli_query( $con,$get_orders);
                    $row_count = mysqli_num_rows($result_orders);
                    if($row_count>0)
                    {
                        echo "<h3 class='text-center text-success'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                       <P class='text-center'> <a href='profile.php?my_orders' class='text-dark'>Order_details</a></p>";
                    }
                    else
                    {
                        echo "<h3 class='text-center text-success'>You have zero pending orders</h3>
                        <P class='text-center'> <a href='../index.php' class='text-dark'>Explore products</a></p>";
                     }
                    }

                }
            }
        }
    }
 
    
?>

