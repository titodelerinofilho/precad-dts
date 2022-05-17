<?php

namespace App\Session;

class Session {

  /**
   *
   * @return boolean
   */
  public static function isLogged() {
      if(!empty($_SESSION['session'])) {
        return true;
      } else {
        return false;
      }
  }

  /**
   *
   * Required Login
   */
  public static function requireLogin() {

    if(!self::isLogged()) {
      header("location: login.php");
      exit;
    }
  }

  /**
   *
   * Required Logout
   */
  public static function requireLogout() {

    if(self::isLogged()) {
      header("location: index.php");
      exit;
    }
  }

}
 ?>
