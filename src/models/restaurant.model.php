<?php

  session_start();

  require('./src/db/postgres.php');

  class RestaurantModel {

    private $conn;

    public $id;
    public $restarant_info;
    public $restaurants;
    public $reviews;
    public $template;

    public function __construct() {

      $this->conn = new PGConnection();

      $this->id = $_GET['id'];

      if (isset($this->id) && !empty($this->id)) {

        $sql = "
          SELECT 	restaurants.*,
          AVG(taste_score) as taste,
          AVG(service_score) as service,
          AVG(place_score) as place,
          AVG(vom_Score) as vom,
          (AVG(taste_score) + AVG(service_score) + AVG(place_score) + AVG(vom_Score))/4 as total_score
          FROM restaurants
          LEFT JOIN reviews
          ON restaurants.id = reviews.restaurant_id
          WHERE restaurants.id = $this->id
          GROUP BY restaurants.id;
        ";

        $this->restarant_info = $this->conn->query($sql);

        $sql = "
          SELECT reviews.id as r_id, reviews.*, users.id, users.username, users.photo
          FROM reviews
          JOIN users
          ON reviews.user_id = users.id
          WHERE reviews.restaurant_id = $this->id
          ORDER BY reviews.created_at DESC;
        ";

        $this->reviews = $this->conn->query($sql);

        $this->template = (count($this->restarant_info) == 0) ? '404' : 'restaurant';

        $this->conn = null;

      } else {


        $sql = "
          SELECT restaurants.id,
          restaurants.name,
          restaurants.photo,
          restaurants.type,
          COUNT(*) as review_count,
          (AVG(taste_score) + AVG(service_score) + AVG(place_score) + AVG(vom_Score))/4 as total_score
          FROM restaurants
          LEFT JOIN reviews
          ON restaurants.id = reviews.restaurant_id
          GROUP BY restaurants.id
          ORDER BY total_score
        ";

        $this->restaurants = $this->conn->query($sql);

        $this->template = 'restaurant.all';

        $this->conn = null;
        
      }

    }

    public function create_review($taste, $service, $place, $vom, $description) {

      $this->conn = new PGConnection();

      $sql = "
        INSERT INTO reviews(user_id, restaurant_id, description, taste_score, service_score, place_score, vom_score, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, now());
      ";

      $this->conn->execute($sql, [$_SESSION['u_id'], $this->id, $description, $taste, $service, $place, $vom]);

      $this->conn->close();

      return;

    }

    public function is_logged_in() {

      if (isset($_SESSION['u_id'])) return true;
      return false;

    }

  }

?>
