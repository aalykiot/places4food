<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

  class UserController {

    private $model;

    public $error;
    public $success;

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

                $result = $this->model->check_credentials($email, $password);

                if ($result['auth'] == true) {

                  $_SESSION['u_id'] = $result['id'];

                  header('Location: ./index.php?page=user');

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
          if (!isset($_SESSION['u_id'])) {
            header('Location: ./index.php?page=user&action=login');
          } else {
            $this->model->set_template('user');
          }
          break;

      }


      if (isset($_POST['info_update_submit'])) {

        $new_username = $_POST['username'];
        $new_email = $_POST['email'];
        $new_password = $_POST['password'];


        if (empty($new_username)) $new_username = $this->model->user['username'];
        if (empty($new_email)) $new_email = $this->model->user['email'];
        if (empty($new_password)) {
          $new_password = $this->model->user['password'];
        } else {
          $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        }

        $available = $this->model->check_availability_for_update($new_email, $new_username);

        if ($available) {

          $error = $this->model->update_info($new_username, $new_email, $new_password);

          if ($error == '00000') {

            $this->model->user['username'] = $new_username;
            $this->model->user['email'] = $new_email;
            $this->model->user['password'] = $new_password;

            $this->success = "Η ανανέωση ήταν επιτυχής!";

          } else {
            $this->error = "Δεν ήταν επιτυχής η ανανέωση του προφίλ!";
          }

        } else {
          $this->error = "Το ψευδώνυμο ή το email είναι πιασμένο!";
        }

      }

      if (isset($_POST['profile_photo_submit'])) {

        $allowed_ext= array('jpg','jpeg','png');

        $file_name = $_FILES['photo_file']['name'];
        $file_tmp = $_FILES['photo_file']['tmp_name'];

        $file_ext = strtolower(end(explode('.', $file_name)));

        if (!empty($file_name)) {

          if(in_array($file_ext, $allowed_ext) === false) {

            $this->error = "Το αρχείο φωτογραφίας δεν είναι συμβατό!";

          } else {

            if (!empty($file_tmp)) {

              $data = file_get_contents($file_tmp);
              $base64 = base64_encode($data);

              $error = $this->model->update_photo($base64);

              if ($error == '00000') {

                $this->model->user['photo'] = $base64;

                $this->success = "Η ανανέωση ήταν επιτυχής!";

              } else {
                $this->error = "Δεν ήταν επιτυχής η ανανέωση του προφίλ!";
              }

            } else {

              $this->error = "Το μέγεθος αρχείο φωτογραφίας υπερβαίνει το επιτρεπτό όριο!";

            }

          }

        } else {
          $this->error = "Δεν έχετε επιλέξει κάποιο αρχείο φωτογραφίας!";
        }

      }

      if (isset($_POST['restaurant_creation_submit'])) {



      }

    }

  }

?>
