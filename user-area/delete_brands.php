<?php
    if(isset($_GET['delete_brands']))
    {
    $delete_id = $_GET['delete_brands'];
    $delete_query = "delete from brands where brand_id= $delete_id ";
    $result_query = mysqli_query($con, $delete_query);
        if($result_query)
        {
        echo "<script>alert('Brand is deleted Successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
        }
    }


?>