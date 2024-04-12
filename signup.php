<?php include("header.php")?>

<div class="background d-flex flex-column min-vh-100 min-vw-100 "> 

<div class="d-flex flex-grow-1 justify-content-center align-items-center">

<div class="login">
  <form class="form m-1 border p-1" action="check_signup.php" method="POST" style="width: 350px; height: 400px; border-radius: 15px;">
    
    <h3 class="text-center text-muted m-4 mb-5">Sign up</h3>

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
      <button type="submit" class="btn-grads btn btn-primary btn-lg" style="border-radius: 15px">Sign Up</button>
    </div> 

    <div class="text-center mt- mb-2"> 
      <a class="btn-grad btn btn-secondary btn-sm p-2" href="login.php" role="button" style="border-radius: 15px">Log In</a>
    </div> 

  </form>
  </div>

</div>

</div>



<?php

//errors for the sign up

if(isset($_GET["user"]))
{
 if($_GET["user"] == "successful")
 {
    echo "<h4>Successfully Added User!</h4>";

 }

 else if($_GET["user"] == "duplicate")
 {

    echo "<h4> User Already Exists </h4>";
    echo "<h4> Please Enter Another Username And Password </h4>";

 }

}

else{
echo "<h4> Sign up </h4>";
}

?>

<?php include("footer.php")?>