<?php

  session_start();

  class UserController {

    private $model;
    public $error;

    public function __construct($model) {

      $this->model = $model;

      switch($_GET['action']) {

        case 'login':

          if (isset($_SESSION['u_id'])) header('Location: ./index.php?page=home');

          if (isset($_POST['login_submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!$email || !$password) {

              $this->error = 'Δεν έχετε συμπληρώσει κάποιο πεδίο!';

            } else {

                $u_id = $this->model->check_credentials($email, $password);

                if ($u_id != null) {

                  $_SESSION['u_id'] = $u_id;

                  header('Location: ./index.php?page=home');

                } else {
                  $this->error = 'Το email ή ο κωδικος είναι λάθος!';
                }

            }

          }

          $this->model->set_template('login');
          break;

        case 'register':

          if (isset($_SESSION['u_id'])) header('Location: ./index.php?page=home');

          if (isset($_POST['register_submit'])) {

            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!$email || !$username || !$password) {

              $this->error = 'Δεν έχετε συμπληρώσει κάποιο πεδίο!';

            } else {

              $available = $this->model->check_availability($email, $username);

              if ($available) {

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $u_id = $this->model->register_user($username, $email, $hashed_password);

                if (isset($u_id)) {

                  $_SESSION['u_id'] = $u_id;

                  header('Location: ./index.php?page=home');

                } else {
                  $this->error = 'Κάτι πήγε στραβά. Προσπαθήστε αργότερα!';
                  return;
                }

              } else {
                $this->error = 'Το email ή το ψευδώνυμο είναι πιασμένο!';
              }

            }

          }

          $this->model->set_template('register');
          break;

        case 'logout':
          if (isset($_SESSION['u_id'])) $_SESSION[u_id] = null;
          header('Location: ./index.php?page=home');
          break;

        default:
          $this->model->set_template('user');
          break;

      }

    }

  }

?>
