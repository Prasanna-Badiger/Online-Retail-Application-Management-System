<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
        .bg_img{
            width:100%;
            height: 100%;

        }
    </style>

</head>
<body background="https://wallpaperaccess.com/full/2593063.jpg">
    <div class="container-fluid my-3">
        <h2 class="text-center">NEW USER REGISTRATION</h2>
        <div class="row d-flex align-items-center justify-content-center ">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_username" class="form-lable">User Name</lable>             
                    <input type="text"  id="user_username" class="form-control" placeholder="Enter User Name" autocomplete="off" required="required" name="user_username">
                </div> 

                <!--email-->
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_email" class="form-lable">Email</lable>             
                    <input type="email"  id="user_email" class="form-control" placeholder="Enter User Email" autocomplete="off" required="required" name="user_email">
                </div> 

                 <!--image-->
                 <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_image"class="form-lable">User Image</lable>             
                    <input type="file"  id="user_image" class="form-control" placeholder="Enter User Email" autocomplete="off" required="required" name="user_image">
                </div> 

                <!--Password-->
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_password" class="form-lable">User Password</lable>             
                    <input type="password"  id="user_password" class="form-control" placeholder="Enter User Password" autocomplete="off" required="required" name="user_password">
                </div> 

                  <!-- conformPassword-->
                  <div class="form-outline mb-4">   <!--username-->
                   <lable for="conf_user_password" class="form-lable">Conform Password</lable>             
                    <input type="password"  id="conf_user_password" class="form-control" placeholder="Enter User Password" autocomplete="off" required="required" name="conf_user_password">
                </div> 


                <!--address-->
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_address" class="form-lable">User Address</lable>             
                    <input type="text"  id="user_address" class="form-control" placeholder="Enter User Address" autocomplete="off" required="required" name="user_address">
                </div> 
                <!--contact-->
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_contact" class="form-lable">User Conatact</lable>             
                    <input type="text"  id="user_contact" class="form-control" placeholder="Enter User Mobile Number" autocomplete="off" required="required" name="user_contact">
                </div> 
                <!--button-->
                <div class="mt-4 pt-2">      <!-- SetUp outline of form-->
                  <input type="submit" value="Register" class="btn btn-info py-2 px-3 border-0" name="user_register">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="user_login.php" class="text-danger"> Login</a></p>
                </div>      
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<!--php-->
<?php
if(isset($_POST['user_register']))
{
$user_username=$_POST['user_username'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];
$hash_password = password_hash($user_password, PASSWORD_DEFAULT);
$conf_user_password=$_POST['conf_user_password'];
$user_address=$_POST['user_address'];
$user_contact=$_POST['user_contact'];
$user_image=$_FILES['user_image']['name'];
$user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    //select query
    $select_query = "select * from user_table where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count>0)
    {
        echo "<script>alert('User name  and Email is already exist')</script>";
    } 
    else if($user_password!=$conf_user_password)
    {
        echo "<script>alert('Password do not match')</script>";
    }
    else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into user_table(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values
        ('$user_username','$user_email','$hash_password','$user_image',
        '$user_ip','$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
     
    }
        //selecting cart items
    $select_cart_items = "select * from cart_details where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if( $rows_count>0)
    {
        $_SESSION['username'] = $user_username;
        echo "<script>alert(Successfully  registered')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else
    {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>