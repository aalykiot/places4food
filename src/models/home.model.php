<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

  require('./src/db/postgres.php');

  class HomeModel {

    private $conn;

    public $sponsored_restaurants;
    public $best_restaurants;
    public $latest_reviews;
    public $user_id;

    public function __construct() {

      $this->conn = new PGConnection();

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
        WHERE sponsored = true
        GROUP BY restaurants.id
        ORDER BY random()
        LIMIT 4;
      ";

      $this->sponsored_restaurants = $this->conn->query($sql);

      $sql = "
        SELECT restaurants.id,
        restaurants.name,
        restaurants.photo,
        restaurants.type,
        COUNT(*) as review_count,
        (AVG(taste_score) + AVG(service_score) + AVG(place_score) + AVG(vom_Score))/4 as total_score,
        COUNT(*) * (AVG(taste_score) + AVG(service_score) + AVG(place_score) + AVG(vom_Score))/4 as inner_score
        FROM restaurants
        JOIN reviews
        ON restaurants.id = reviews.restaurant_id
        GROUP BY restaurants.id
        ORDER BY inner_score DESC
        LIMIT 8;
      ";

      $this->best_restaurants = $this->conn->query($sql);

      $sql = "
        SELECT
        reviews.id as rrv_id,
        users.id as u_id,
        users.photo as u_photo,
        restaurants.id as r_id,
        restaurants.name as r_name,
        reviews.description as description
        FROM reviews
        JOIN users ON users.id = user_id
        JOIN restaurants ON restaurants.id = restaurant_id
        ORDER BY reviews.created_at DESC
        LIMIT 9;
      ";

      $this->latest_reviews = $this->conn->query($sql);

      $this->conn->close();

    }

    public function is_logged_in() {

      if (isset($_SESSION['u_id'])) return true;
      return false;

    }

  }

?>
