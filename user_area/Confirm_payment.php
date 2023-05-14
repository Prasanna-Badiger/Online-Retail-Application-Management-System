<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id']))
{
    $order_id = $_GET['order_id'];
    $select_data= "select * from user_orders where order_id=$order_id";
    $result = mysqli_query($con,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
     $invoice_number =$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['Confirm_payment']))
{
   // $order_id = $_POST['order_id'];
    $invoice_number =$_POST['invoice_number'];
    $amount =$_POST['amount'];
    $payment_mode =$_POST['payment_mode'];
    $insert_query ="insert into user_payments (order_id,invoice_number,amount,payment_mode,date)
    values($order_id,$invoice_number,$amount,'$payment_mode',NOW()) ";
    $result_query = mysqli_query($con,$insert_query);
    if($result_query)
    {
        echo "<h3 class='text-center text-light'>Completed Payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "update user_orders set order_status='Complete' where order_id=$order_id";
    $result_orders = mysqli_query($con, $update_orders);


}
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
<body class="bg-secondary">
    <div class="container my-5">
    
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto"  value="<?php echo $invoice_number ?>"  name="invoice_number" >
            </div>
            <div class="form-outline msy-4 text-center w-50 m-auto">
                <lable for="" class="text-light">Amount</lable>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
              <select name="payment_mode" id="" class="form-select w-50 m-auto">
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>Cash on Delivery</option>
                <option>Net Banking</option>

              </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="bg-info py-2 px-3 border-0" value="confirm" name="Confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>