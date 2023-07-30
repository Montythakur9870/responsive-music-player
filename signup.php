<?php
session_start();

include('db_connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_re_password = $_POST['user_re_password'];


    if(!empty($user_name) && !empty($user_email) && !empty($user_password) && !is_numeric($user_name)){
      if($user_password === $user_re_password){
          $query = "insert into user ( user, Email, Password) VALUES ('$user_name', '$user_email', '$user_password')";
          mysqli_query($con, $query);
          header("Location: login.php");
      } else {
          echo"<script> alert('Password Does Not Match'); </script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="user_name" required placeholder="enter username">
      <input type="email" name="user_email" required placeholder="enter your email">
      <input type="password" name="user_password" required placeholder="enter your password">
      <input type="password" name="user_re_password" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>
<?php
// echo('<h3>'.$msg.'</h3>');
?>
</div>

</body>
</html>