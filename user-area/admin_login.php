<?php

include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

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
    <style>
        body
        {
            overflow-x: hidden;
        }
    </style>

</head>
<body background="https://wallpaperaccess.com/full/2593169.jpg">
    <div class="container-fluid my-3">
        <h2 class="text-center">ADMIN LOGIN</h2>
        <div class="row d-flex align-items-center justify-content-center ">
        <div class="col-lg-6 col-xl-4">
                <img src="../images/admin.png" alt="Admin Registartion" class="img-fluid">
            </div>
        <div class="col-lg-6 col-xl-6">
            
                <form action="" method="post" >
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_username" class="form-lable">User Name</lable>             
                    <input type="text"  id="user_username" class="form-control" placeholder="Enter User Name" autocomplete="off" required="required" name="user_username">
                </div> 
                <!--Password-->
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_password" class="form-lable">User Password</lable>             
                    <input type="password"  id="user_password" class="form-control" placeholder="Enter User Password" autocomplete="off" required="required" name="user_password">
                </div> 

                <!--button-->
                <div class="mt-4 pt-2">      <!-- SetUp outline of form-->
                  <input type="submit" value="Login" class="btn btn-info py-2 px-3 border-0" name="admin_login">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="admin_registration.php" class="text-danger"> Register</a></p>
                </div>      
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php 

if(isset($_POST['admin_login']))
{
    global $con;
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];
$select_query = "select * from admin_table where admin_name='$user_username'";
    $result = mysqli_query( $con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);



    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['admin_password'])) {
            //echo "<script>alert('Login Successful')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Invalid Crendentials')</script>";
            }
        }
    }
}

?>