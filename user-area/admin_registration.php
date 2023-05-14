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

</head>
<body background="https://wallpaperaccess.com/full/2593120.jpg">
    <div class="container-fluid my-3">
        <h2 class="text-center">ADMIN REGISTRATION</h2>
        <div class="row d-flex align-items-center justify-content-center ">
        <div class="col-lg-6 col-xl-4">
                <img src="../images/admin.png" alt="Admin Registartion" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-6">

                <form action="" method="post">
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_username" class="form-lable">User Name</lable>             
                    <input type="text"  id="user_username" class="form-control" placeholder="Enter User Name" autocomplete="off" required="required" name="user_username">
                </div> 

                <!--email-->
                <div class="form-outline mb-4">   <!--username-->
                   <lable for="user_email" class="form-lable">Email</lable>             
                    <input type="email"  id="user_email" class="form-control" placeholder="Enter User Email" autocomplete="off" required="required" name="user_email">
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

                <!--button-->
                <div class="mt-4 pt-2">      <!-- SetUp outline of form-->
                  <input type="submit" value="Register" class="btn btn-info py-2 px-3 border-0" name="user_register">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="admin_login.php" class="text-danger"> Login</a></p>
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


    //select query
    $select_query = "select * from admin_table where admin_name='$user_username' or admin_email='$user_email'";
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
       
        $insert_query = "insert into admin_table(admin_name,admin_email,admin_password) values
        ('$user_username','$user_email','$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);
     
    }
        
}
?>