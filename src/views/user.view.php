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
      $success = $this->controller->success;
      $user = $this->model->user;
      $is_logged_in = $this->model->is_logged_in();

      require_once('./src/templates/'.$this->model->template.'.template.php');

    }

  }

?>
