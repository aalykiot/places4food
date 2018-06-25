<?php

  require('./src/db/postgres.php');

  class UserModel {

    public $template;

    private $conn;

    public function __construct() {

    }

    public function set_template($template) {
      $this->template = $template;
    }

    public function check_credentials($email, $password) {

      $this->conn = new PGConnection();

      $sql = "SELECT password AS hash FROM users WHERE email='$email';";

      $result = $this->conn->query($sql);

      $this->conn = null;

      return password_verify($password, $result[0]['hash']);

    }

    public function check_availability($email, $username) {

      $this->conn = new PGConnection();

      $sql = "SELECT COUNT(*) FROM users WHERE email='$email' OR username='$username'";

      $result = $this->conn->query($sql);

      $this->conn = null;

      return $result[0]['count'] == 0 ? true : false;

    }

    public function register_user($username, $email, $password) {

      $this->conn = new PGConnection();

      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);";

      $u_id = $this->conn->execute($sql, [$username, $email, $password]);

      $this->conn = null;

      return $u_id;

    }

  }

?>
