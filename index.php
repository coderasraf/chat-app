<?php 
      session_start();
?>

<?php include 'header.php' ?>
  <body>

  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form enctype="multipart/form-data" autocomplete="off">
        <div class="error-txt alert alert-danger"></div>
        <div class="name-details">
          <div class="field">
            <label for="fname">First Name</label>
            <input type="text" id="fname" placeholder="Enter First name" name="fname" required>
          </div>
          <div class="field">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" placeholder="Enter Last name" name="lname" required >
          </div>
        </div>
          <div class="field">
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="Enter Email" name="email" required>
          </div>

          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter your password" name="password" required>
            <i class="fa fa-eye"></i>
          </div>
          <div class="field image-field">
            <label for="image">Select Image</label>
            <input type="file" id="image" name="image" required>
          </div>
          <div class="field">
            <input type="submit" value="Continue To Chat" class="submit-btn button">
          </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login Now</a></div>
    </section>
  </div>

  <!-- Jqurey Min File -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <!-- Javascript Main File -->
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/signup.js"></script>
   <script>
     const passField = document.querySelector('.form .field input[type="password"]');
      const toggleBtnn = document.querySelector('.form .field i');
      toggleBtnn.onclick = function(){
          if(passField.type == 'password'){
            passField.type = 'text';
            this.classList.add('active'); 
          }else{
            passField.type = 'password';
            this.classList.remove('active');
          }
      }
   </script>
  </body>
</html>