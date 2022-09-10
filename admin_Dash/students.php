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
        <h1 style="color: blue; font-size: 2rem;">Students List</h1>
        <button style="margin-left:850px; position: absolute; top: -6px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="add_student.php">Add New</a></button>
        <?php
     include('../php/partials/dbconnect.php');
      $sql = "SELECT * FROM student";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<table class="mytable" width="950" border="1" cellspacing="0">
       <thead>
        <tr>
         <th>Student ID</th>
         <th>Student Name</th>
         <th>Student Email</th>
         <th>Student Occupation</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["stu_id"].'</th>';
          echo '<td>'. $row["stu_name"].'</td>';
          echo '<td>'.$row["stu_email"].'</td>';
          echo '<td>'.$row["stu_occ"].'</td>';
          echo '<td><form action="edit_student.php" method="POST" style="display: inline;"> <input type="hidden" name="id" value='. $row["stu_id"] .'><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
          <form action="" method="POST" style="display: inline;" ><input type="hidden" name="id" value='. $row["stu_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
        include('../php/partials/dbconnect.php');
       $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
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
