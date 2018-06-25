<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4Food | Σύνδεση</title>
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
        <li><a href="#">Κριτικές</a></li>
        <li><a href="#">Εστιατόρια</a></li>
        <li><a href="#">Χρήστες</a></li>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu vertical medium-horizontal">
        <li><a href="./index.php">Αρχική</a></li>
        <li><a href="./index.php?page=user&action=register">Εγγραφή</a></li>
      </ul>
    </div>
  </div>

  <br><br><br><br>


  <div class="row column">
    <center>
      <form class="callout text-center" action="#" method="POST" style="width: 600px;">
        <h2>Σύνδεση χρήστη</h2>
        <br>
        <div class="floated-label-wrapper">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Email">
        </div>
        <div class="floated-label-wrapper">
          <label for="pass">Κωδικός</label>
          <input type="password" id="pass" name="password" placeholder="Κωδικός">
        </div>
        <input class="button expanded" type="submit" name="login_submit" value="Σύνδεση">
        <? if (isset($error)) { ?>

          <div style="color: #c0392b;">
            <b><?php echo $error ?> </b>
          </div>
        <?php } ?>
      </form>
    <center>
  </div>


  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
