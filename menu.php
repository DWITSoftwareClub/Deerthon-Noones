<!--Universal Menu -->
<meta charset="utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/9220452bf2.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="custom.css">
<nav class="navbar navbar-default">
 <div class="container-fluid">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
   </div>
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="index.php">Home</a><li>
       <li><a href="form.php">Form</a></li>
       <li><a href="ranking.php">Ranking</a></li>
       <li><a href="listdata.php">Dataset</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
       <?php
       session_start();
       //Show My Child and logout if user is logged in
       if(isset($_SESSION['name'])){
                  echo'<li><a href="mychild.php"><span><i class="fa fa-child"></i></span>My Child</a></li>';
         echo'<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
       }
       //Show Signup and Login if user is not logged in
       else{
         echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
         echo'<li><a href="signup.php"><span class="glyphicon glyphicon-plus"></span> Sign Up</a></li>';
       }
       session_write_close();
      ?>
     </ul>
   </div>
 </div>
</nav>
