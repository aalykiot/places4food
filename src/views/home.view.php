<?php

  class HomeView {

    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function render() {
      $random_restaurants = $this->model->random_restaurants;

      require_once('./src/templates/home.template.php');
    }

  }

?>
