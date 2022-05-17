<?php

session_start();

unset($_SESSION);

session_destroy();

if($_SESSION == NULL) {
  header('location: login.php');
}

 ?>
