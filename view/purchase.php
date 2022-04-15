<?php
session_start();
 if(!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='Studentlogin.php'; </script>";
 } else {
  $stuEmail = $_SESSION['stuLogEmail'];
 } 
  ?>
<?php
 include ("../php/partials/dbconnect.php");
 if($_SERVER["REQUEST_METHOD"]=='POST')
{
    if(isset($_POST['purchase'])){
        $stu_email=$_POST['stu_email'];
        $amount=$_POST['amount'];
        $pnumber=$_POST['pnumber'];
        $pay_mode=$_POST['pay_mode'];
        $sql = "INSERT INTO order_manager (stu_email, pnumber, pay_mode,amount) VALUES ('$stu_email', '$pnumber', '$pay_mode','$amount')";
    if($conn->query($sql) == TRUE)
    {
        $order_id=mysqli_insert_id($conn);
        $sql1= "INSERT INTO student_orders (order_id, item_name, item_price,Qunatity,item_id) VALUES (?,?,?,?,?)";
        $stmt=mysqli_prepare($conn,$sql1);
        if($stmt)
        {
            if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $key => $values) {
                mysqli_stmt_bind_param($stmt,"isiii",$order_id,$values['item_name'],$values['item_price'],$values['Quantity'],$values['item_id']);
                // item_name=$values['item_name'];
                // item_price=$values['item_price'];
                // Quantity=$values['Quantity'];
                // item_id=$values['item_id'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['cart']);
            echo "
            <script>
           alert('Order placed');
            location.href='index.php';
            </script>
           ";
            }
        }
    }
        else{
            echo "
            <script>
           alert('something went wrong');
            location.href='cart.php';
            </script>
           ";
        }
     
    } else {
             echo "
             <script>
            alert('something went wrong');
             location.href='cart.php';
             </script>
            ";
    }
    } 


?>