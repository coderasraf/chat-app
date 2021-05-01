<?php 
      session_start();
      if(!isset($_SESSION['unique_id'])){
            header('location:login.php');
      }
?>
<?php include 'header.php' ?>
  <body>
  <div class="wrapper">
    <section class="users">
    <header>
        <?php 
          include 'php/config.php';
          $sql = "SELECT * FROM users WHERE unique_id='{$_SESSION['unique_id']}'"; 
          $run_sql = mysqli_query($conn, $sql);
          if(mysqli_num_rows($run_sql) > 0){
              $row = mysqli_fetch_assoc($run_sql);
          }     
        ?>
        <div class="content">
            <img src="php/images/<?php echo $row['img']; ?>" alt="">
            <div class="details">
                <span><?php echo $row['fname'] . ' ' .$row['lname'];  ?></span>
                <p><?php echo $row['status']; ?></p>
            </div>
        </div>
        <a class="logout" href="logout.php">Logout</a>
    </header>
    <div class="search">
        <span class="text">Select an users to start chat!</span>
        <input type="text" placeholder="Search Users">
        <button><i class="fa fa-search"></i></button>
    </div>
    <div class="users-list"></div>
    </section>
  </div>
  <?php include 'footer.php'; ?>