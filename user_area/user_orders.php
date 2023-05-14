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
    <?php
    $username = $_SESSION['username'];
    $get_user = "select * from user_table where username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    ?>
<h3 class="text-success text-center">All My Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
        <th>Sl No</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
</tr>
    </thead>
    <tbody class="bg-secondary text-light">

    <?php
          $get_order_details = "select * from user_orders ";// where user_id=$user_id";
    $result_orders = mysqli_query($con, $get_order_details);
    $number = 1;
    while($row_data=mysqli_fetch_assoc($result_orders))
    {
        $order_id = $row_data['order_id'];
        $amount_due = $row_data['amount_due'];
        $amount_due = $row_data['amount_due'];
        $total_products = $row_data['total_products'];
        $invoice_number = $row_data['invoice_number'];
        $order_status = $row_data['order_status'];
        if($order_status=='pending')
        {
            $order_status = 'Incomplete';
        }
        else
        {
            $order_status = 'complete';
        }
        $order_date = $row_data['order_date'];
      
        echo "  <tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$total_products</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td>";

        ?>
        <?php
        if($order_status=='Complete')
        {echo "<td>Paid</td>";
        } else {
            echo " <td><a href='Confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>

    </tr>";
        }
        $number++;

    }
    
    
    ?>
      
    </tbody>
</table>

</body>
</html>