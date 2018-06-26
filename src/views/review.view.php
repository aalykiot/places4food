<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

  class ReviewView {

    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function render() {

      $reviews = $this->model->reviews;
      $is_logged_in = $this->model->is_logged_in();

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
