<?php

  class RestaurantView {

    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function render() {

      $restaurant_info = $this->model->restarant_info[0];
      $restaurants = $this->model->restaurants;
      $reviews = $this->model->reviews;
      $is_logged_in = $this->model->is_logged_in();

      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
