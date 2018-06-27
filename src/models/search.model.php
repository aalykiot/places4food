<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

  require('./src/db/postgres.php');

  class SearchModel {

    private $conn;

    public $restaurants_found;
    public $restaurants;
    public $template;

    public function __construct() {
      $this->template = 'search';
    }

    public function search($search_query) {

      $this->conn = new PGConnection();

      $sql = "SELECT COUNT(*) FROM restaurants WHERE name LIKE '%$search_query%';";

      $this->restaurants_found = $this->conn->query($sql)[0]['count'];

      if ($this->restaurants_found > 0) {

        $sql = "
          SELECT restaurants.id,
          restaurants.name,
          restaurants.photo,
          restaurants.type,
          COUNT(*) as review_count,
          (AVG(taste_score) + AVG(service_score) + AVG(place_score) + AVG(vom_Score))/4 as total_score,
          COUNT(*) * (AVG(taste_score) + AVG(service_score) + AVG(place_score) + AVG(vom_Score))/4 as inner_score
          FROM restaurants
          LEFT JOIN reviews
          ON restaurants.id = reviews.restaurant_id
          WHERE lower(restaurants.name) LIKE lower('%$search_query%')
          GROUP BY restaurants.id
          ORDER BY inner_score DESC;
        ";

        $this->restaurants = $this->conn->query($sql);

      }

      $this->conn->close();

    }

    public function is_logged_in() {

      if (isset($_SESSION['u_id'])) return true;
      return false;

    }

  }

?>
