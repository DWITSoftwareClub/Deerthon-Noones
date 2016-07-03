<?php
  session_start();
  unset($_SESSION['name']);
  unset($_SESSION['message']);
  session_write_close();
  //redirect to site home page
  header("Location: index.php");
  ?>
