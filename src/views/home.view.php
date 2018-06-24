<?php

  class HomeView {

    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function render() {

      $sponsored_restaurants = $this->model->sponsored_restaurants;
      $best_restaurants = $this->model->best_restaurants;
      $latest_reviews = $this->model->latest_reviews;
      $is_logged_in = $this->model->is_logged_in();

      require_once('./src/templates/home.template.php');

    }

  }

?>
