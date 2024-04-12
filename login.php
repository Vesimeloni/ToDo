<?php include("header.php");

session_start();

// Check if user is already logged in
if(isset($_SESSION["username"])) {
  header("Location: home.php");
  exit;
}

?>



<div class="background d-flex flex-column min-vh-100 min-vw-100 "> 

<div class="d-flex flex-grow-1 justify-content-center align-items-center">

<div class="login">
  <form class="form m-1 border p-1" action="check_login.php" method="POST" style="width: 350px; height: 400px;">
    
    <h3 class="text-center text-muted m-4 mb-5">Log In</h3>

    <!-- Show errors -->
    <?php if(isset($_GET['error'])): ?>
      <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <div class="form-group form-floating m-4">
      <label for="floatingInput" class="text-center">Username:</label>
      <input id="floatingInput" type="text" class="form-control" name="username" placeholder="Username" style="opacity: .5; border-radius: 20px">
    </div>

    <div class="form-group form-floating m-4">
      <label for="floatingPassword" class="text-center">Password</label>
      <input id="floatingPassword" type="password" class="form-control" name="password" placeholder="Password" style="opacity: .5; border-radius: 20px">
    </div>

    <div class="text-center mt-3 mb-4"> 
      <button type="submit" class="btn-grad btn btn-primary  btn-lg" style="border-radius: 15px">Log In</button>
    </div> 

    <div class="text-center mt- mb-2"> 
      <a class="btn-grads btn btn-secondary btn-sm p-2" href="signup.php" role="button" style="border-radius: 15px">Sign Up</a>
    </div> 

  </form>
  </div>

</div>

</div>


<?php include("footer.php")?>
