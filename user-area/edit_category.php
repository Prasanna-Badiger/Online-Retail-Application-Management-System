<?php
     if(isset($_GET['edit_category']))
     {
     $edit_id = $_GET['edit_category'];
     $get_data = "select * from categories where category_id=$edit_id";
     $result = mysqli_query($con,$get_data);
     $row_data = mysqli_fetch_assoc($result);
     $category_title = $row_data['category_title'];
    
     }
     if(isset($_POST['edit_cat']))
     {
        $cat_title = $_POST['category_title'];
    $update_data = "update categories set  category_title='$cat_title'";// where category_id=$edit_id";
    $result_update = mysqli_query($con,$update_data);
    if($result_update)
    {
        echo "<script>alert('Category is been updated Successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }

    }
?>




<div class="container mt-5">      <!--Form Creation-->
     <h1 class="text-center">Edit Category</h1>
       
    <form action="",method="post" class="text-center">              <!--enctype is help to insert a images-->
         <div class="form-outline mb-4 w-50 m-auto ">      <!-- SetUp outline of form-->
             <lable for="category_title" class="form-lable">Category Title</lable>             
            <input type="text" name="category_title" value=<?php echo  $category_title ?>  id="category_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="w-50 m-auto ">      <!-- SetUp outline of form-->
            <input type="submit" name="edit_cat" class="btn btn-info px-3 mb-3" value="Update category">
        </div>   
    </form>