<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khaja ghar</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/util.css">
</head>

<body>
    <nav class="container">
        <div class="nav-wrapper">
            <div class="brand">
                <img src="../img/logo.jpg" alt="">
            </div>
            <ul class="nav-list">
                <li class="active">
                    <a href="index.php">Home</a>
                </li>
               <li><a href="#item_section">Menus</a></li>

               <?php 
                 session_start();
                 $count=0;
                 if(isset($_SESSION['cart'])){
                     $count=count($_SESSION['cart']);
                 }
                 if(isset($_SESSION['is_login'])){
                     echo '
                     <li><a href="../student_profile/student_profile.php">My profile</a></li>
                     <li><a href="logout.php">Logout</a></li>
                     <li><a href="cart.php">My Cart('.$count.')</a></li>
                     ';
                    }
                     else{
                         echo '
                         <li><a href="Studentlogin.php">login</a></li>
                         <li><a href="Studentregister.php">signup</a></li>
                         ';
                 }
                      ?>
               <li><a href="#student_feedback">Feedback</a></li>

            </ul>
        </div>
    </nav>
