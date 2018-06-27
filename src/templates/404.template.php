<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4Food | 404</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>

</head>

<body>

  <div class="title-bar" data-responsive-toggle="mainNavigation" data-hide-for="medium">
    <div class="title-bar-left">
      <button class="menu-icon" type="button" data-toggle="mainNavigation"></button>
      <div class="title-bar-title">Menu</div>
    </div>
    <div class="title-bar-right">
      Places4Food
    </div>
  </div>
  <div class="top-bar" id="mainNavigation">
    <div class="top-bar-left">
      <ul class="menu vertical medium-horizontal">
        <li class="menu-text hide-for-small-only">Places4Food</li>
        <li><a href="./index.php?page=restaurant">Εστιατόρια</a></li>
        <li><a href="./index.php?page=reviews">Κριτικές</a></li>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu vertical medium-horizontal">
        <?php if ($is_logged_in) { ?>
          <li><a href="./index.php?page=user">Λογαριασμός</a></li>
          <li><a href="./index.php?page=user&action=logout">Αποσύνδεση</a></li>
        <?php } else { ?>
          <li><a href="./index.php?page=user&action=login">Σύνδεση</a></li>
          <li><a href="./index.php?page=user&action=register">Εγγραφή</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <br><br><br><br>
  <center>
    <img src="./assets/images/404.png" width="400" height="200" /><br><br><br><br>
    <h5>Ούπς δεν υπάρχει κάτι εδώ! Επιστροφή στην <a href="./index.php?page=home">αρχική</a></h6>
  </center>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
