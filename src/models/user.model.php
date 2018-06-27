<?php

  require('./src/db/postgres.php');

  class UserModel {

    private $conn;

    public $template;
    public $user;

    public function __construct() {

      if (isset($_SESSION['u_id'])) {

        $this->conn = new PGConnection();

        $self_id = $_SESSION['u_id'];

        $sql = "SELECT * FROM users WHERE id = '$self_id';";

        $this->user = $this->conn->query($sql)[0];

        $this->conn = null;

      }

    }

    public function set_template($template) {
      $this->template = $template;
    }

    public function check_credentials($email, $password) {

      $this->conn = new PGConnection();

      $sql = "SELECT id, password AS hash FROM users WHERE email='$email';";

      $result = $this->conn->query($sql);

      $this->conn = null;

      return array(
        'auth' => password_verify($password, $result[0]['hash']),
        'id' => $result[0]['id']
      );

    }

    public function check_availability($email, $username) {

      $this->conn = new PGConnection();

      $sql = "SELECT COUNT(*) FROM users WHERE email='$email' OR username='$username'";

      $result = $this->conn->query($sql);

      $this->conn = null;

      return $result[0]['count'] == 0 ? true : false;

    }

    public function check_availability_for_update($email, $username) {

      $this->conn = new PGConnection();

      $self_id = $_SESSION['u_id'];

      $sql = "SELECT COUNT(*) as count FROM users WHERE (email='$email' OR username='$username') AND id != $self_id;";

      $result = $this->conn->query($sql);

      $this->conn = null;

      return $result[0]['count'] == 0 ? true : false;

    }


    public function delete_restaurant($r_id, $self_id) {

      $this->conn = new PGConnection();

      $sql = "DELETE FROM reviews WHERE restaurant_id = ?;";

      $this->conn->execute($sql, [$r_id]);

      $sql = "DELETE FROM restaurants WHERE id = ? AND created_by = ?;";

      $result = $this->conn->execute($sql, [$r_id, $self_id]);

      return $result;

    }

    public function register_user($username, $email, $password) {

      $this->conn = new PGConnection();

      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);";

      $error = $this->conn->execute($sql, [$username, $email, $password]);

      $sql = "SELECT id FROM users WHERE email='$email';";

      $u_id = $this->conn->query($sql)[0]['id'];

      $this->conn = null;

      return $u_id;

    }

    public function add_restaurant($name, $type, $location, $description, $photo, $link) {

      $this->conn = new PGConnection();

      $sql = "SELECT NOW()";

      $now_timestamp = $this->conn->query($sql)[0]['now'];

      $sql = "
        INSERT INTO restaurants (name, type, location, description, photo, created_by, created_at, site_link)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);
      ";

      $self_id = $_SESSION['u_id'];

      $error = $this->conn->execute($sql, [$name, $type, $location, $description, $photo, $self_id, $now_timestamp, $link]);

      $sql = "SELECT id FROM restaurants WHERE created_by = '$self_id' AND created_at = '$now_timestamp';";

      $r_id = $this->conn->query($sql)[0]['id'];

      return $r_id;

    }

    public function update_info($username, $email, $password) {

      $this->conn = new PGConnection();

      $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?;";

      $error = $this->conn->execute($sql, [$username, $email, $password, $_SESSION['u_id']]);

      $this->conn = null;

      return $error;

    }

    public function update_photo($base64) {

      $this->conn = new PGConnection();

      $sql = "UPDATE users SET photo = ? WHERE id = ?;";

      $error = $this->conn->execute($sql, [$base64, $_SESSION['u_id']]);

      $this->conn = null;

      return $error;

    }

    public function is_logged_in() {

      if (isset($_SESSION['u_id'])) return true;

      return false;

    }

  }

?>
