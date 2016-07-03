<html>
<head>
  <title>Login</title>
</head>
<body>
  <?php include('menu.php'); ?>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 well">
        <div>
          <form method="post" action="login_process.php">
            <div class="text-center text-primary">
              <h3>Login</h2>
            </div>
            <div class="text-center text-warning">
              <?php
              //executed if invalid data is provided by the user
              session_start();
              if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                session_write_close();
              } ?>
            </div>
            <div>
              <label>Email:</label>
              <input type="text" name="email" placeholder="Email">
            </div>
            <div>
              <label>Password:</label>
              <input type="password" name="password" placeholder="Password">
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-log-in"> Login</span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  </html>
