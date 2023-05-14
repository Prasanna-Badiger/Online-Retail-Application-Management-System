
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
    <h1 class="text-center text-success">All Products</h1>
    <table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
        <th>Product Id</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
       <!-- <th>Status</th>-->
       <!-- <th>Edit</th>-->
        <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

<?php

$get_products = "select * from products ";// where user_id=$user_id";
$result = mysqli_query($con,$get_products );
$number = 0;
while($row_data=mysqli_fetch_assoc($result))
{
    $product_id  = $row_data['product_id'];
    $product_title = $row_data['product_title'];
    $product_image = $row_data['product_image'];
    $product_price = $row_data['product_price'];
    $number++;

    ?>
 
      <tr class='text-center'>
    <td><?php echo $number?></td>
    <td> <?php echo $product_title?></td>
    <td><img src='product_images/<?php echo $product_image;?>' class='product_img'/></td>
    <td><?php echo $product_price?>/-</td>
    <td>
        <?php
        $get_count = "select * from order_pending ";//where product_id=$product_id ";// where user_id=$user_id";
     $result_count = mysqli_query($con,$get_count );
        $rows_count = mysqli_num_rows($result_count);
        echo $rows_count;

       ?>
    </td>
    <!--<td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>-->
    <td><a href='index.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

</tr>
  
<?php
}


?>
  
</tbody>

</body>
</html>