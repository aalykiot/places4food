<?php

  class SearchView {

    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function render() {

      $search_query = $_GET['q'];
      $restaurants_found = $this->model->restaurants_found;
      $restaurants = $this->model->restaurants;
      $is_logged_in = $this->model->is_logged_in();

      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
