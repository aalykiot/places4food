<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

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

      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");

      require_once('./src/templates/home.template.php');

    }

  }

?>
