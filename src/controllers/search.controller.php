<?php

  class SearchController {

    private $model;

    public function __construct($model) {

      $this->model = $model;

      if (isset($_GET['q']) && !empty($_GET['q'])) {

        $search_query = $_GET['q'];

        $this->model->search($search_query);

        if (isset($_GET['lucky_search_submit']) && $this->model->restaurants_found > 0) {

          $lucky_restaurant_id = $this->model->restaurants[0]['id'];

          header('Location: ./index.php?page=restaurant&id='.$lucky_restaurant_id);
          return;

        }


      }

    }

  }

?>
