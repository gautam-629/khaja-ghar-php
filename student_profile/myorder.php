<?php
if(!isset($_SESSION)){ 
    session_start(); 
  }
if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
   } else {
    echo "<script> location.href='../view/index.php'; </script>";
   }
  
?>
<?php  include("nav_bar.php")?>
<section style="position:absolute; left: 250px; top: 100px;">
    <div>
        <h1 style="color: blue; font-size: 2rem;"> My Order List</h1>
        <?php
     include('../php/partials/dbconnect.php');
      $sql = "SELECT * FROM order_manager where stu_email='$stuEmail'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<table style="text-align: center;" class="mytable" width="1000px" border="1" cellspacing="0">
       <thead>
        <tr>
         <th>Order ID</th>
         <th>Email</th>
         <th>Phone Number</th>
         <th>Pay Mode</th>
         <th>Total Amount</th>
         <th>Order Date</th>
         <th>Orders</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["order_id"].'</th>';
          echo '<td>'. $row["stu_email"].'</td>';
          echo '<td>'.$row["pnumber"].'</td>';
          echo '<td>'.$row["pay_mode"].'</td>';
          echo '<td>'.$row["amount"].'</td>';
          echo '<td>'.$row["order_date"].'</td>';
          echo '<td>';
           echo '<table style="text-align: center; margin-left: 60px;" border="1" width="250" cellspacing="0">
                   <tr>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Item ID</th>
                     <th>Qunatity</th>
                   </tr>';
                   $sql1 = "SELECT * FROM student_orders WHERE order_id='".$row['order_id']."'";
                   $result1 = $conn->query($sql1);
                   while($row1 = $result1->fetch_assoc()){
                    echo'   <tr>
                    <td>'.$row1["item_name"].'</td>
                    <td>'.$row1["item_price"].'</td>
                    <td>'.$row1["item_id"].'</td>
                    <td>'.$row1["Qunatity"].'</td>
                     </tr>';
                   }
        echo '</table>
              </td>';
              echo'
              <td> 
              <form action="" method="POST" style="display: inline;" ><input type="hidden" name="id" value='. $row["order_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
              </td>';
        echo'</tr>';
        }
        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
        include('../php/partials/dbconnect.php');
       $sql = "DELETE FROM order_manager WHERE order_id = {$_REQUEST['id']}";
       if($conn->query($sql) === TRUE){
         // echo "Record Deleted Successfully";
         // below code will refresh the page after deleting the record
         echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
         } else {  
           echo "Unable to Delete Data";
         }
      }
     ?>
    </div>
    <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="../view/index.php">Back to Home</a></button>
<?php  include("footer.php")?>