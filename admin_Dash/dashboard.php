<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../view/index.php'; </script>";
 }
?>
<?php  include("nav_bar.php")?>
<style>
  .box{
    display: flex;
   justify-content: space-between;
    position:absolute; 
    left: 250px;
    top: 100px;
   
  }
  .sub-box1{
    height: 200px;
     width: 200px;
     background-color: aqua;
     margin: 0px 45px;
     text-align: center;
     border-radius: 10px;
  }
  .sub-box2{
    height: 200px;
    width: 200px;
    background-color: burlywood;
    margin: 0px 45px;
    text-align: center;
    border-radius: 10px;
  }
  .sub-box3{
    height: 200px;
    width: 200px;
    background-color: rgb(166, 58, 166);
    margin: 0px 45px;
    text-align: center;
    border-radius: 10px;
  }
</style>
<?php
 include('../php/partials/dbconnect.php');
$sql = "SELECT * FROM item";
$result = $conn->query($sql);
$totalitem = $result->num_rows;

 $sql = "SELECT * FROM student";
 $result = $conn->query($sql);
 $totalstu = $result->num_rows;

 $sql = "SELECT * FROM student_orders";
 $result = $conn->query($sql);
 $totalsold = $result->num_rows;

?>

<div class="box">
  <div class="sub-box1">
       <h2>Items</h1>
       <h2 style="margin-top: 3rem;">  <?php echo $totalitem; ?></h2>
       <a style="color: blue; text-decoration: none; margin-top: 1rem; display: inline-block; font-size: 2rem;" href="menus.php">view</a>
  </div>
  <div class="sub-box2">
       <h2>Students</h2>
       <h2 style="margin-top: 3rem;"> <?php echo $totalstu; ?></h2>
       <a style="color: blue; text-decoration: none; margin-top: 1rem; display: inline-block; font-size: 2rem;" href="students.php">view</a>
  </div>
  <div class="sub-box3">
       <h2>order items</h2>
       <h2 style="margin-top: 3rem;">  <?php echo $totalsold; ?></h2>
       <a style="color: blue; text-decoration: none; margin-top: 1rem; display: inline-block; font-size: 2rem;" href="#">view</a>
  </div>
</div>


<section style="position:absolute; left: 167px;top: 300px;">
  <div>
    <h1 style="color: blue; font-size: 2rem;">Order List</h1>
    <?php
     include('../php/partials/dbconnect.php');
      $sql = "SELECT * FROM order_manager";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<table width="100px" border="1" cellspacing="0">
       <thead>
        <tr>
         <th>Order ID</th>
         <th>Email</th>
         <th>Phone Number</th>
         <th>Pay Mode</th>
         <th>Total Amount</th>
         <th>Order Date</th>
         <th>Status</th>
         <th>Orders</th>
         <th>Action</th>
         <th>change status</th>
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
          echo '<td>'.$row["order_status"].'</td>';
          echo '<td>';
           echo '<table border="1" cellspacing="0">
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
            echo' <td>
              <form action="" method="POST" style="display: inline;" ><input type="hidden" name="id" value='. $row["order_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
              </td>';



              echo' <td>
              <form action="status.php" method="POST" style="display: inline;" ><input type="hidden" name="id" value='. $row["order_id"] .'>
                              <select name="status" id="" onchange="form.submit()">
                                <option value="pending">pending</option>
                                <option value="completed">completed</option>
                              </select>
              </form></td>
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
         // below code will refresh the page after deleting the record
         echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
         } else {  
           echo "Unable to Delete Data";
         }
      }

     ?>
  </div>
  <?php  include("footer.php")?>