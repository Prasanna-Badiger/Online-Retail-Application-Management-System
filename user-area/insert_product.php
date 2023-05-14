<?php
include('../includes/connect.php');
if(isset($_POST['Insert_products']))
{
  $product_title =isset($_POST['product_title']) ? $_POST['product_title'] : '';
  $product_description =isset($_POST['product_description']) ? $_POST['product_description'] : '';
  $product_keyword =isset($_POST['keyword']) ? $_POST['keyword'] : '';
  $product_category=isset($_POST['product_category'])? $_POST['product_category'] : '';
  $product_brand =isset($_POST['product_brand'])? $_POST['product_brand'] : '';
  $product_price =isset($_POST['product_price'])? $_POST['product_price'] : '';
  $product_image = $_FILES['product_image']['name'];

  $temp_image = $_FILES['product_image']['tmp_name'];
  move_uploaded_file($temp_image, "./product_images/ $product_image");
  //select data from database
//   $select_query = "select * from products where product_title= '$product_title'";
//   $result_select = mysqli_query($con, $select_query);
//   $number = mysqli_num_rows($result_select);
//   if($number>0)
//   {
//    echo "<script>alert('This  categories is present inside the database')</script>";
//   }
//   else
//   {

 $insert_query="insert into products (product_title,product_description,keyword,product_category,product_brand,product_price,product_image) values ('$product_title','$product_description',' $product_keyword ','$product_category','$product_brand','$product_price','$product_image')"; 
  $result = mysqli_query($con, $insert_query);
  if($result)
  {
    echo "<script>alert('products has been inserted successfully')</script>";
  
}
 }

?>
!<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Producsts-Admin Dashboard</title>
       <!--css link-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="../style.css">
    <!-- jslink-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
-->
</head>
<body class="bg-light">
<div class="container mt-3">     <!--Form Creation-->
    
<h2 class="text-center">Insert products</h2>
<form action="" method="post" calss="mb-2 text_center"  enctype="multipart/form-data">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Insert product Title" aria-label="products" aria-describedby="basic-addon1">
</div>


<!--<form action="" method="post" calss="mb-2 text_center">-->
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="product_description" id ="product_description" placeholder="Insert product_description" aria-label="products" aria-describedby="basic-addon1">
</div>


<div class="input-group w-90 mb-3 ">      <!-- SetUp outline of form-->
      <!--   <lable for="keyword" class="form-lable"></lable> -->  
      <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>          
          <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required="required">
   </div>

<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="product_category" id="product_category"placeholder="Insert category_title" aria-label="products" aria-describedby="basic-addon1">
</div>

<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="product_brand" id="product_brand" placeholder="Insert brand_title" aria-label="products" aria-describedby="basic-addon1">
</div>

<!--<div class="input-group w-90 mb-3 ">   -->   <!-- SetUp outline of form-->
<!--<span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
--> <!-- <lable for="product_image1" class="form-lable">Product image1</lable>-->             
  <!--  <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
</div>-->


<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="product_price" placeholder="Insert product_price" aria-label="products" aria-describedby="basic-addon1">
</div>
<div class="input-group w-90 mb-3 ">      <!-- SetUp outline of form-->
<span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
   <!-- <lable for="product_image1" class="form-lable">Product image1</lable>-->             
    <input type="file" name="product_image" id="product_image" class="form-control"  required="required">
</div>


<div class="input-group w-10 mb-auto">

  <input type="Submit" class="  bg-info border-0 p-2" name="Insert_products" value="Insert products"  >

</div>
</form>

 
</div>

</body>
</html>
  