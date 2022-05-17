<?php

namespace App\Entity;


class Usuario {
  /**
   * [public description]
   * @var integer
   */
  private $id;

  /**
   * [public description]
   * @var string
   */
  private $user;

  /**
   * [public description]
   * @var string
   */
  private $email;

  /**
   * [public description]
   * @var string
   */
  private $password;

  /**
   * [public description]
   * @var integer
   */
  private $status;
  /**
   * [private description]
   * @var integer
   */
  private $level;


  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    return $this->id = $id;
  }
  public function getUser() {
    return $this->user;
  }
  public function setUser($user) {
    return $this->user = $user;
  }
  public function getPassword() {
    return $this->password;
  }
  public function setPassword($password) {
    return $this->password = $password;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setEmail($email) {
    return $this->email = $email;
  }
  public function getStatus() {
    return $this->status;
  }
  public function setStatus($status) {
    return $this->status = $status;
  }
  public function getLevel() {
    return $this->level;
  }
  public function setLevel($level) {
    return $this->level = $level;
  }

}



 ?>
