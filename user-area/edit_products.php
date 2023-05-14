<?php
    if(isset($_GET['edit_products']))
    {
    $edit_id = $_GET['edit_products'];
    $get_data = "select * from products where product_id= $edit_id ";
    $result = mysqli_query($con, $get_data);
    $row_data = mysqli_fetch_assoc($result);
    $product_title = $row_data['product_title'];
    $product_desc = $row_data['product_description'];
    $keyword = $row_data['keyword'];
    $product_category = $row_data['product_category'];
    $product_brand = $row_data['product_brand'];
    $product_price = $row_data['product_price'];
    $product_image = $row_data['product_image'];
    //$product_image = $_FILES['product_image']['name'];

  $temp_image = $_FILES['product_image']['tmp_name'];
  move_uploaded_file($temp_image, "./product_images/ $product_image");


    $select_category = "select * from Categories";// where category_id= '$product_category'";
    $result_query = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_query);
    $category_title = $row_category['category_title'];
 

    $select_brand = "select * from brands";// where brand_id= $product_brand";
    $result_query = mysqli_query($con, $select_brand);
    $row_category = mysqli_fetch_assoc($result_query);
    $brand_title = $row_category['brand_title'];
  

    }

?>
<div class="container mt-5">      <!--Form Creation-->
     <h1 class="text-center">Edit products</h1>
            <!--title-->  
    <form action="",method="post" enctype="multipart/form-data">              <!--enctype is help to insert a images-->
         <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="product_title" class="form-lable">Product title</lable>             
            <input type="text" name="product_title" value=<?php echo $product_title?> id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="product_desc" class="form-lable">Product Description</lable>             
            <input type="text" name="product_desc" id="product_desc" value="<?php echo $product_desc?>" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="keyword" class="form-lable">Product keyword</lable>             
            <input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>"class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto "> 
        <lable for="product_category" class="form-lable">Product categories</lable>             
        <select name="product_category" id="" class="form-select ">
        <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
        <?php

                
    $select_category = "select * from Categories ";
    $result_query = mysqli_query($con, $select_category);
    while($row_category = mysqli_fetch_assoc($result_query))
    {
        $category_title = $row_category['category_title'];
        $category_id = $row_category['category_id'];
         echo "<option value='$category_id'>$category_title</option>";

    }
    //$category_title = $row_category['category_title'];
    
   
                ?>
        </select>     <!-- SetUp outline of form-->
        </div>
        <div class="form-outline mb-4 w-50 m-auto "> 
        <lable for="product_brand" class="form-lable">Product Brands</lable>             
        <select name="product_brand" id="" class="form-select ">
        <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
        <?php
  
       
 $select_category = "select * from brands";
    $result_query = mysqli_query($con, $select_category);
    while($row_category = mysqli_fetch_assoc($result_query))
    {
        $brand_title = $row_category['brand_title'];
        $brand_id = $row_category['brand_id'];
         echo "<option value='$brand_id'>$brand_title</option>";

    }
    ?>
        </select>     <!-- SetUp outline of form-->
        </div>
        <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="product_image" class="form-lable">Product image</lable>             
            <div class="d-flex">
             <input type="file" name="product_image" id="product_image" class="form-control w-90 m-auto" placeholder="Enter product title" autocomplete="off" required="required">
            <img src="./product_images/<?php echo $product_image?>" alt="" class="product_img">
            
            </div>
            </div>
            <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="product_price" class="form-lable">Product Price</lable>             
            <input type="text" name="product_price" id="product_price" value=<?php echo $product_price?> class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="w-50 m-auto ">      <!-- SetUp outline of form-->
            <input type="submit" name="edit_product" class="btn btn-info px-3 mb-3" value="Update product">
        </div>    
    </form>    
</div>

<?PHP

    if(isset($_POST['edit_product']))
    {
        $product_title = $_POST['product_title'];
        $product_desc = $_POST['product_description'];
        $keyword = $_POST['keyword'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp, "./product_images/$product_image");

    $update_product = "update products set  product_title='$product_title',product_description='$product_desc',
       keyword='$keyword',product_category='$product_category',product_brand='$product_brand',product_price='$product_price',
       product_image='$product_image',date=NOW() where product_id=$edit_id ";
       $result_update = mysqli_query($con,$update_product);
    if($result_update)
    {
        echo "<script>alert('Product Updated Successfully')</script>";
       // echo "<script>window.open('./insert_product.php','_self')</script>";
    }
    }
?>