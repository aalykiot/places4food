<?php

  $page = $_GET['page'];

  if (!empty($page)) {

    $routes = array(

      'home' => array('path' => 'home', 'view' => 'HomeView', 'model' => 'HomeModel', 'controller' => 'HomeController'),
      'user' => array('path' => 'user', 'view' => 'UserView', 'model' => 'UserModel', 'controller' => 'UserController')

    );

    foreach ($routes as $route => $value) {
      if ($page == $route) {
        $path = $value['path'];
        $model = $value['model'];
        $view = $value['view'];
        $controller = $value['controller'];
        break;
      }
    }

    if (isset($path)) {

      require_once('./src/views/'.$path.'.view.php');
      if ($model) require_once('./src/models/'.$path.'.model.php');
      if ($controller) require_once('./src/controllers/'.$path.'.controller.php');

      if ($model) $m = new $model();
      if ($controller) $c = new $controller($m, $_GET, $_POST);
      $v = new $view($m, $c);

      echo $v->render();
    }

  } else {
    header('Location: ./index.php?page=home');
  }


?>
