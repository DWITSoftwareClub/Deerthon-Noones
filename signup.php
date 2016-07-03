<?php
include("db.php");
include("menu.php");
?>
<!--Signup to the System so that user will be able to trace the child's nutrition history -->
      <!DOCTYPE html>
      <html lang="en">
          <head>
              <meta charset="utf-8">
              <title>Sign Up</title>
          </head>
          <body>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4 well">
                <div class="text-center text-primary">
                  <h3>Sign Up</h3>
                </div>
                <div align="center">
                  <form action="signup_process.php" method="post">
                    <div>
                      <label>First Name</label>
                      <input type="text" name="fname" placeholder="First Name">
                    </div>
                    <div>
                      <label>Last Name</label>
                      <input type="text" name="lname" placeholder="Last Name">
                    </div>
                    <div>
                      <label>Email Address</label>
                      <input type="text" name="email" placeholder="Email Address">
                    </div>
                    <div>
                      <label>Password</label>
                      <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">
                      <span class="glyphicon glyphicon-plus"> Sign Up</span>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>
        </body>
      </html>
