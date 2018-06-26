<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4food | Account</title>
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
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



  <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <br>

        <?php if ($error) { ?>

          <div class="row">
            <div style="padding: 10px;margin-right: 20px;background: #c0392b; color: #fff;">
              <b style="margin-left: 25px;"><?php echo $error ?></b>
            </div>
          <div/>
          <br>

        <?php } ?>


        <?php if ($success) { ?>

          <div class="row">
            <div style="padding: 10px;margin-right: 20px;background: #2ecc71; color: #fff;">
              <b style="margin-left: 25px;"><?php echo $success ?></b>
            </div>
          <div/>
          <br>

        <?php } ?>

        <div class="row">
          <hr>
          <h5 style="margin-left: 50px;">Ανανέωση πληροφοριών</h5><hr>
          <br>
          <div style="width: 600px;margin-left: 50px;">
            <form action="./index.php?page=user" method="POST">
              <label>Ψευδώνυμο
                <input type="text" autocomplete="off" name="username" placeholder="<?php echo $user['username'] ?>">
              </label>
              <label>Email
                <input type="email" autocomplete="off" name="email" placeholder="<?php echo $user['email'] ?>">
              </label>
              <label>Κωδικός
                <input type="password" name="password" placeholder="**************">
              </label>
              <input type="submit" name="info_update_submit" class="button expanded" value="Αποθήκευση">
            </form>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <hr>
          <h5 style="margin-left: 50px;">Αλλαγή εικόνας προφίλ</h5><hr>
          <br>
          <div style="width: 600px;margin-left: 50px;">
            <form action="./index.php?page=user" method="POST" enctype="multipart/form-data">
              <label>Φωτογραφία προφίλ
                <input type="file" name="photo_file">
              </label>
              <input type="submit" name="profile_photo_submit" class="button expanded" value="Αποθήκευση">
            </form>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <hr>
          <h5 style="margin-left: 50px;">Δημιουργία Εστιατορίου</h5><hr>
          <br>
          <div style="width: 600px;margin-left: 50px;">
            <form action="./index.php?page=user" method="POST">
              <label>Όνομα
                <input type="text" autocomplete="off" name="name">
              </label>
              <label>Κατηγορία
                <select>
                  <option value="Σουβλάκι & Σχάρα">Σουβλάκι & Σχάρα</option>
                  <option value="Ταβέρνες & Ψητοπωλεία">Ταβέρνες & Ψητοπωλεία</option>
                  <option value="Μεζεδοπωλεία">Μεζεδοπωλεία</option>
                  <option value="Cafe- Restaurants">Cafe- Restaurants</option>
                  <option value="Ελληνική κουζίνα">Ελληνική κουζίνα</option>
                  <option value="Ιταλία">Ιταλία</option>
                  <option value="Bar Restaurants">Bar Restaurants</option>
                  <option value="Τσιπουράδικα - Ουζερί">Τσιπουράδικα - Ουζερί</option>
                  <option value="Μοντέρνα κουζίνα">Μοντέρνα κουζίνα</option>
                  <option value="American style">American style</option>
                  <option value="Ζαχαροπλαστεία & Φούρνοι">Ζαχαροπλαστεία & Φούρνοι</option>
                  <option value="Ιαπωνία- Sushi ">Ιαπωνία- Sushi </option>
                </select>
              </label>
              <label>Τοποθεσία
                <input type="text" autocomplete="off" name="location">
              </label>
              <label>Λίγα Λόγια
                <textarea style="height: 200px;" autocomplete="off" name="description"></textarea>
              </label>
              <label>Φωτογραφία
                <input type="file" name="photo_file">
              </label>
              <input type="submit" name="restaurant_creation_submit" class="button expanded" value="Δημιουργία Εστιατορίου">
            </form>
          </div>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
