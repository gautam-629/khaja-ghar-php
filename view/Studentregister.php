<?php include ("header.php") ?>
<section class="container">
    <div class="formsRl">
    <form action="" method="post" class="myform" id="stuRegForm">
        <span id="successMsg"></span>
     <div>
         <label for="name">Name</label> <span style="margin-left: 4px;" id="statusMsg1"></span> <br>
         <input  class="form-input" type="text"  name="name" placeholder="Enter your name" id="stuname" required>
     </div>
     <div>
        <label for="name">email</label><span style=" margin-left: 4px;" id="statusMsg2"></span><br>
        <input class="form-input" type="email" name="email" placeholder="Enter your email" id="stuemail" required>
    </div>
    <div>
        <label for="name">password</label><span style=" margin-left: 4px;" id="statusMsg3"></span><br>
        <input  class="form-input" type="password" name="password" placeholder="Enter password" id="stupass" required> <br>
    </div>
    <div style="display: flex; align-items: center; "> 
        <button class="btn" type="button" id="signup" onclick="addStu();">signup</button> <br>
        <span><a style="margin-left: 5px; color: #0000ff;" href="Studentlogin.php">Alreay have account?</a></span>
    </div>
    </form>
  
</div>
</section>
<?php include ("footer.php") ?>
