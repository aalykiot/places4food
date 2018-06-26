<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4Food | Αναζήτηση</title>
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

  <div class="callout large">
    <div class="row column text-center">
      <br><br>
      <form action="./index.php" method="GET">
        <input type="hidden" value="search" name="page"/>
        <center>
          <input type="search" name="q" autocomplete="off"  value="<?php echo $search_query ?>" placeholder="π.χ Το χάνι του Σταύρου" style="width: 600px">
        </center>
        <input type="submit" class="button large" name="search_submit" value="Αναζήτηση"/>
        <input type="submit" class="button large hollow" name="lucky_search_submit" value="Αισθάνομαι τυχερός"/>
      </form>
      <br><br>
    </div>
  </div>

  <br>
  <article class="grid-container">

      <?php if ($restaurants_found == 0) { ?>

        <?php if (!empty($search_query)) { ?>

          <center>
            <h5><span style="opacity: 0.7;"><i>Δεν υπήρξαν αποτελέσματα για</i></span> <span><?php echo $search_query ?></h5>
          </center>

        <?php } ?>

      <?php } else { ?>

        <center>
          <h5><span style="opacity: 0.7;"><i>Βρέθηκαν <?php echo $restaurants_found ?> αποτελέσματα για</i></span> <span><?php echo $search_query ?></h5>
        </center>

        <br><br>
        <div class="grid-x grid-margin-x small-up-2 medium-up-2 large-up-4">

        <?php foreach($restaurants as $restaurant) { ?>

        <div class="cell">
          <img class="thumbnail" src="data:image/jpeg;base64,<?php echo $restaurant['photo'] ?>">
          <h5> <?php echo $restaurant['name'] ?> </h5>
          <h6 style="opacity: 0.7"> <?php echo $restaurant['type'] ?> </h6>

          <?php
            if (isset($restaurant['total_score'])) {
          ?>

          <h6> <?php echo number_format($restaurant['total_score'], 1) ?> / 4  <img src="../assets/icons/star.png" style="position: relative; top: -2px;" width="20" height="20"/> από <?php echo $restaurant['review_count'] ?> κριτικές</h6>
          <?php } else { ?>

            <h6>  0 / 4  <img src="./assets/icons/star.png" style="position: relative; top: -2px;" width="20" height="20"> No reviews yet</h6>
          <?php } ?>

          <a href="./index.php?page=restaurant&id=<?php echo $restaurant['id'] ?>" class="button expanded">Περισσότερα</a>

        </div>

        <br>

        <?php } ?>



      <?php } ?>

    </div>
  </article>
  <br><br><br>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
