<?php include("header.php");



?>

<nav class="navbar navbar-expand-md navbar-light" style="background-color: #CDEEED">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarNavAltMarkup">
      <span class="navbar-text">
        ToDoApp
      </span>
             
      <h3>Welcome, 
        <?php
        session_start();
        echo $_SESSION["username"]; 
        ?>
        !
      </h3>
      
      <div class="navbar-nav ms-auto">
        <a class="nav-item nav-link" href="logout.php">Logout</a>
      </div>
  </div>
</nav>


<?php
  //Defining page variable for the active status.
  $page="copy.php";
?>

<div class="container-fluid ">
  <div class="row  min-vh-100">
  <!--Lists bar starts-->

  <nav id="sidebar" class="col-md-2 collapse d-lg-block sidebar border-end border-2 position-sticky">
  

      <div class="sidebar-header text-black text-center m-1 p-1">
            <h3>Lists</h3>
      </div> 


      <div >
      <div class="p-1">
        <?php include("lfunc/addList.php")?>
        <?php include("lfunc/deletelist.php")?>
        <form class="" method="post" action="home.php">
          <input class="m-1" type="text" name="list_name" placeholder="New list" />
          <button class="m-1" type="submit" name="submit" class="">Add List</button>
        </form>
        <div class="m-2 p-1 d-flex  justify-content-center align-items-center">
        <?php include("lfunc/displayLists.php")?>

        </div>
      </div>
      </div>

    

    
  </nav>
  <!--Lists bar ends -->

  <!--Tasks starts-->
  <div id="main" class="col-md-10" >
      <div class="header text-center">
            <h1>Tasks</h1>
      </div>

        <div class="d-flex flex-column  h-100">

            <div class="m-3 p-2 flex-grow-1 d-flex flex-column  align-items-center">
                <?php include("tfunc/displaytasks.php"); ?>
             </div>
      
              <div class="p-2  d-flex  justify-content-center align-items-center" style="height: 300PX">
                <form action="tfunc/addtask.php" method="POST">
                
                  <input class="m-2" type="text" name="task" />
                  <input class="m-2" type="submit" value="Add" />

                </form>
              </div>
         </div>
       

  </div>
  <!--Tasks End-->
 </div>
</div>

<?php include("footer.php")?>