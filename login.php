<?php 
      session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>RealTime Chatapp :: Using Core PHP</title>
      <!-- Fontawesome CSS File -->
      <link rel="stylesheet" type="text/css" href="css/all.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
  <body>

  <div class="wrapper">
    <section class="form login">
      <header>Realtime Chat App</header>
      <form action="#">
        <div class="error-txt alert alert-danger"></div>
          <div class="field">
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="Enter Email" name="email">
          </div>

          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter your password" name="password">
            <i class="fa fa-eye"></i>
          </div>
          <div class="field">
            <input type="submit" value="Login" class="submit-btn button">
          </div>
      </form>
      <div class="link">Are you new? <a href="index.php">Signup Now</a></div>
    </section>
  </div>

  <!-- Jqurey Min File -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <!-- Javascript Main File -->
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/login.js"></script>
   <script>
     const passField = document.querySelector('.form .field input[type="password"]');
      const toggleBtnn = document.querySelector('.form .field i');
      toggleBtnn.onclick = function(){
          if(passField.type == 'password'){
            passField.type = 'text';
            passField.classList.add('active');
          }else{
            passField.type = 'password';
          }
      }
   </script>
  </body>
</html>