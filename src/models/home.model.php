<?php

  require('./src/db/postgres.php');

  class HomeModel {

    private $conn;

    public $random_restaurants;
    public $best_restaurants;

    public function __construct() {

      $this->conn = new PGConnection();

      $this->random_restaurants = $this->conn->query("SELECT * FROM restaurants ORDER BY random() LIMIT 4;");

      $this->conn->close();

    }

  }

?>
