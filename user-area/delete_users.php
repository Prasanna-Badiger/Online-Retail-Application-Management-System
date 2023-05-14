<?php
    if(isset($_GET['delete_users']))
    {
    $delete_id = $_GET['delete_users'];
    $delete_query = "delete from user_table";// where user_id= $delete_id ";
    $result_query = mysqli_query($con, $delete_query);
        if($result_query)
        {
        echo "<script>alert('User is deleted Successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
        }
    }


?>