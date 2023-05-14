<?php
     if(isset($_GET['edit_brands']))
     {
     $edit_id = $_GET['edit_brands'];
    $get_data = "select * from brands ";
     $result = mysqli_query($con,$get_data);
     $row_data = mysqli_fetch_assoc($result);
     $brand_title = $row_data['brand_title'];
    
     }
     if(isset($_POST['edit_cat']))
     {
        $cat_title = $_POST['brand_title'];
    $update_data = "update `brands` brand_title=$cat_title where brand_id=$edit_id";
    $result_update = mysqli_query($con,$update_data);
    if($result_update)
    {
        echo "<script>alert('Category is been updated Successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }

    }
?>




<div class="container mt-5">      <!--Form Creation-->
     <h1 class="text-center">Edit Brands</h1>
       
    <form action="",method="post" class="text-center">              <!--enctype is help to insert a images-->
         <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="brand_title" class="form-lable">Category Title</lable>             
            <input type="text" name="brand_title" value=<?php echo  $brand_title ?>  id="brand_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="w-50 m-auto ">      <!-- SetUp outline of form-->
            <input type="submit" name="edit_cat" class="btn btn-info px-3 mb-3" value="Update Brands">
        </div>   
    </form>
</div>