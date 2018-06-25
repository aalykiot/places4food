<?php

  class UserView {

    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function render() {

      $error = $this->controller->error;

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
