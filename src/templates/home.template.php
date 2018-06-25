<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4Food | Αρχική</title>
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
        <?php if ($is_logged_in) { ?>
          <li><a href="./index.php?page=user">Λογαρισμός</a></li>
          <li><a href="./index.php?page=user&action=logout">Αποσύνδεση</a></li>
        <?php } else { ?>
          <li><a href="./index.php?page=user&action=login">Σύνδεση</a></li>
          <li><a href="./index.php?page=user&action=register">Εγγραφή</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>

  <div class="callout large">
    <div class="row column text-center">
      <br><br><br/>
      <h1 style="opacity: 0.6">Ψάξε ανάμεσα σε 750 εστιατόρια!</h1>
      <br>
      <center>
        <input type="search" placeholder="π.χ Το χάνι του Σταύρου" style="width: 600px">
      </center>
      <a href="#" class="button large">Αναζήτηση</a>
      <a href="#" class="button large hollow">Αισθάνομαι τυχερός</a>
      <br><br><br/>
    </div>
  </div>


  <br>
  <div class="text-center">
    <h2>Οι δικές μας προτάσεις</h2>
  </div>
  <br>
  <article class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-2 large-up-4">

      <?php foreach($sponsored_restaurants as $restaurant) { ?>

      <div class="cell">
        <img class="thumbnail" src="data:image/jpeg;base64,<?php echo $restaurant['photo'] ?>">
        <h5> <?php echo $restaurant['name'] ?> </h5>
        <h6 style="opacity: 0.7"> <?php echo $restaurant['type'] ?> </h6>

        <?php
          if (isset($restaurant['total_score'])) {
        ?>

        <h6> <?php echo number_format($restaurant['total_score'], 1) ?> / 4  <img src="../assets/icons/star.png" style="position: relative; top: -2px;" width="20" height="20"/> από <?php echo $restaurant['review_count'] ?> κριτικές</h6>
        <?php } else { ?>

          <h6>  0 / 4  <img src="../assets/icons/star.png" style="position: relative; top: -2px;" width="20" height="20"> No reviews yet</h6>
        <?php } ?>

        <a href="./index.php?page=restaurant&id=<?php echo $restaurant['id'] ?>" class="button expanded">Περισσότερα</a>

      </div>

      <?php } ?>


    </div>
    <hr>
    <div class="text-center">
      <h2>Με τις καλύτερες κριτικές</h2>
      <hr>
    </div>
    <div class="grid-x grid-margin-x small-up-2 medium-up-2 large-up-4">

      <?php foreach($best_restaurants as $restaurant) { ?>

      <div class="cell">
        <img class="thumbnail" src="data:image/jpeg;base64,<?php echo $restaurant['photo'] ?>">
        <h5> <?php echo $restaurant['name'] ?> </h5>
        <h6 style="opacity: 0.7"> <?php echo $restaurant['type'] ?> </h6>

        <?php
          if (isset($restaurant['total_score'])) {
        ?>

        <h6> <?php echo number_format($restaurant['total_score'], 1) ?> / 4  <img src="../assets/icons/star.png" style="position: relative; top: -2px;" width="20" height="20"/> από <?php echo $restaurant['review_count'] ?> κριτικές</h6>
        <?php } else { ?>

          <h6>  0 / 4  <img src="../assets/icons/star.png" style="position: relative; top: -2px;" width="20" height="20"> No reviews yet</h6>
        <?php } ?>

        <a href="./index.php?page=restaurant&id=<?php echo $restaurant['id'] ?>" class="button small expanded hollow">Περισσότερα</a>

      </div>

      <?php } ?>

    </div>
    <hr>
    <div class="grid-x align-bottom">
      <div class="medium-4 cell">
        <br>
        <h4>Πρόσφατες κριτικές</h4>
        <br>

        <?php for($i = 0; $i < 3; $i++){ ?>

          <div class="media-object">
            <div class="media-object-section">
              <a href="./index.php?page=user&id=<?php echo $latest_reviews[$i]['u_id'] ?>">
                <img class="thumbnail" width="120" height="120" src="data:image/jpeg;base64,<?php echo $latest_reviews[$i]['u_photo'] ?>">
              </a>
            </div>
            <div class="media-object-section">
              <h6>Για το <a href="./index.php?page=restaurant&id=<?php echo $latest_reviews[$i]['r_id'] ?>"><b><?php echo $latest_reviews[$i]['r_name'] ?></b></a></h6>
              <p> <?php echo substr($latest_reviews[$i]['description'], 0, 100).'...' ?> <a href="./index.php?page=restaurant&id=<?php echo $latest_reviews[$i]['r_id'] ?>">Συνέχεια</a></p>
            </div>
          </div>

        <?php } ?>

      </div>

      <div class="medium-4 cell">

        <?php for($i = 3; $i < 6; $i++){ ?>

          <div class="media-object">
            <div class="media-object-section">
              <a href="./index.php?page=user&id=<?php echo $latest_reviews[$i]['u_id'] ?>">
                <img class="thumbnail" width="120" height="120" src="data:image/jpeg;base64,<?php echo $latest_reviews[$i]['u_photo'] ?>">
              </a>
            </div>
            <div class="media-object-section">
              <h6>Για το <a href="./index.php?page=restaurant&id=<?php echo $latest_reviews[$i]['r_id'] ?>"><b><?php echo $latest_reviews[$i]['r_name'] ?></b></a></h6>
              <p> <?php echo substr($latest_reviews[$i]['description'], 0, 100).'...' ?> <a href="./index.php?page=restaurant&id=<?php echo $latest_reviews[$i]['r_id'] ?>">Συνέχεια</a></p>
            </div>
          </div>

        <?php } ?>

      </div>

      <div class="medium-4 cell">

        <?php for($i = 6; $i < 9; $i++){ ?>

          <div class="media-object">
            <div class="media-object-section">
              <a href="./index.php?page=user&id=<?php echo $latest_reviews[$i]['u_id'] ?>">
                <img class="thumbnail" width="120" height="120" src="data:image/jpeg;base64,<?php echo $latest_reviews[$i]['u_photo'] ?>">
              </a>
            </div>
            <div class="media-object-section">
              <h6>Για το <a href="./index.php?page=restaurant&id=<?php echo $latest_reviews[$i]['r_id'] ?>"><b><?php echo $latest_reviews[$i]['r_name'] ?></b></a></h6>
              <p> <?php echo substr($latest_reviews[$i]['description'], 0, 100).'...' ?> <a href="./index.php?page=restaurant&id=<?php echo $latest_reviews[$i]['r_id'] ?>">Συνέχεια</a></p>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
  </article>
  <br>
  <footer class="callout large secondary">
    <article class="grid-container">
      <div class="grid-x">
        <div class="large-4 cell">
          <h5>Place4Food ~ 2018</h5>
        </div>
        <div class="large-5 large-offset-3 cell">
          <p>Στόχος μας να βοήθησουμε τους καλύτερους ανθρώπους να ανακαλήψουν τα καλύτερα εστιατόρια της προτίμησης τους.</p>
        </div>
    </article>
  </footer>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
