
<?php include("header.php") ?>
    <!-- start hero section -->
    <section class="container hero" >
        <div style="width: 50%;">
            <h6 style="font-size: 1rem;"><em>Are you hungry?</em></h6>
            <h1 style="font-size: 3.5rem; font-weight: bold;">Don't Wait!</h1>
            <button class="btn"><a href="#item_section">Order Now</a></button>
        </div>
        <div>
            <div style="width:50%;">
                <img src="../img/hero1.jpg" alt="">
            </div>
        </div>
    </section>
   <!-- end hero section -->

   <!-- start item section -->

    <!-- All items section -->
    <section id="item_section" style="margin-top: 3rem;" class="container">
        <h1 style="font-weight: bold; font-size: 2rem; text-align: center;">All Items</h1>
        <div class="item-wrapper container">
            <?php 
            include ("../php/partials/dbconnect.php");
             $sql = "SELECT * FROM item";
             $result = $conn->query($sql);
             if($result->num_rows > 0){ 
               while($row = $result->fetch_assoc()){
                 $item_id = $row['item_id'];
          echo' <div style="width: 16rem;">
                <img style="height: 10rem;" src="'.$row['item_img'].'" alt="">
                <div style="text-align: center;">
                      <form action="manage_cart.php" method="post">
                    <h2 style="margin-right: 7rem;">'.$row['item_name'].'</h2>
                    <span style="font-weight: bold; margin-right: 7rem;">Duration:'.$row['item_duration'].'</span>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-right: 6rem; margin-top: 1rem;">
                        <span style="font-weight: bold;">NRS '.$row['item_price'].'</span>
                        <input type="hidden"  name="item_id" value="'.$row['item_id'].'">
                        <input type="hidden" name="item_name" value="'.$row['item_name'].'">
                        <input type="hidden" name="item_duration" value="'.$row['item_duration'].'">
                        <input type="hidden" name="item_price" value="'.$row['item_price'].'">
                        <button type="submit" style="display: flex; align-items: center;justify-content:space-between" class="add-to-cart" name="add-to-cart">
                            <span>+</span>
                            <span>Add</span>
                        </button>
                    </div>
                </form>
                </div>
            </div>';
               }
            }
            ?>
        </div>
    </section>
    
   <!-- end item section -->


   <!-- start student Feedback -->
   <section id="student_feedback" class="container" style="background-color: rgb(127, 127, 185); margin-top: 1rem;">
       <h1 style="text-align: center; color: white;">Student's Feedback</h1>
       <div class="student-wrapper">

       <?php 
              $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['stu_img'];
            ?>

       <div style="margin: 2px;">
        <div style="border: 1px solid white; width:300px;" class="student-text">
           <p style="color: white;">
           <?php echo $row['f_content'];?>  
           </p>
        </div>
           <div style="margin-top: 2px; margin-left: 50px;">
               <img style="border-radius: 300px; border: 1px solid red;" src="<?php echo  $s_img; ?>" alt="" width="120px">
                <div>
                    <span style="color: rgb(255, 190, 68); margin-left: .6rem;"><?php echo $row['stu_name']; ?></span> <br>
                     <span style="color: white; margin-left: 2rem;""><?php echo $row['stu_occ']; ?></span>
                </div>
           </div>
        </div>
        <?php }} ?>
        

      <!-- end student Feedback -->

       </div>
   </section>
   <?php include("footer.php") ?>