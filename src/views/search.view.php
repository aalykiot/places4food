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

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
