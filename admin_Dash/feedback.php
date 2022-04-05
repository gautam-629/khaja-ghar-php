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
<section style="position:absolute; left:200px; top: 100px;">
    <div>
        <h1 style="color: blue; font-size: 2rem;">Feed Back List</h1>
        
        <?php
     include('../php/partials/dbconnect.php');
      $sql = "SELECT * FROM feedback";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<table class="feedback" width="950" border="1" cellspacing="0">
       <thead>
        <tr>
         <th>Feedback ID</th>
         <th>Content</th>
         <th>Student Id</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["f_id"].'</th>';
          echo '<td>'. $row["f_content"].'</td>';
          echo '<td>'.$row["stu_id"].'</td>';
          echo '<td>
          <form action="" method="POST" style="display: inline;" ><input type="hidden" name="id" value='. $row["f_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
        include('../php/partials/dbconnect.php');
       $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
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
<?php  include("footer.php")?>