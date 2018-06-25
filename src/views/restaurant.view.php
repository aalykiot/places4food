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

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
