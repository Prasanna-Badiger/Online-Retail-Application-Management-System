<?php
    if(isset($_GET['delete_orders']))
    {
    $delete_id = $_GET['delete_orders'];
    $delete_query = "delete from user_orders ";//where order_id=$delete_id";
    $result_query = mysqli_query($con, $delete_query);
        if($result_query)
        {
        echo "<script>alert('Order is deleted Successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
        }
    }


?>