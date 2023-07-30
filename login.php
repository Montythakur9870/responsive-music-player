<?php

session_start();
include('db_connect.php');
if (isset($_POST['user_name'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $query = "select * from user where user = '".$user_name."' AND password = '".$user_password."' limit 1";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)==1) {
        header('Location: welcome.php');
    } else {
        echo"<script> alert('Password Does Not Match'); </script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="user_name" required placeholder="enter your username">
      <input type="password" name="user_password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="signup.php">register now</a></p>
   </form>

<!-- <h2>Incorrect Password</h2> -->
</div>
<?php
// echo('<h3>'.$msg.'</h3>');
?>

</body>
</html>