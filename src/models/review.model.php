<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

  require('./src/db/postgres.php');

  class ReviewModel {

    private $conn;

    public $reviews;
    public $template;

    public function __construct() {

      $this->conn = new PGConnection();

      $sql = "
        SELECT reviews.*, users.id, users.username, restaurants.id, restaurants.name
        FROM reviews
        JOIN users ON users.id = reviews.user_id
        JOIN restaurants ON restaurants.id = reviews.restaurant_id
        ORDER BY created_at DESC;
      ";

      $this->reviews = $this->conn->query($sql);

      $this->conn->close();

      $this->template = "review";

    }

    public function is_logged_in() {

      if (isset($_SESSION['u_id'])) return true;
      return false;

    }

  }

?>
