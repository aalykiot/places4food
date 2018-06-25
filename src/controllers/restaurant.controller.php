<?php

  class RestaurantController {

    private $model;

    public function __construct($model) {

      $this->model = $model;

      if (isset($_POST['create_review'])) {

        $id = $_GET['id'];

        if (!empty($id)) {

          $taste = $_POST['taste'];
          $service = $_POST['service'];
          $place = $_POST['place'];
          $vom = $_POST['vom'];
          $description = $_POST['description'];

          $this->model->create_review($taste, $service, $place, $vom, $description);

        }
        header("Location: ./index.php?page=restaurant&id=$id");

      }

    }

  }

?>
