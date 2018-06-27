<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4food | <?php echo $restaurant_info['name'] ?></title>
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

  <br>

  <div class="row columns">
    <nav aria-label="You are here:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="./index.php">Αρχικη</a></li>
        <li><a href="./index.php?page=restaurant">Εστιατορια</a></li>
        <li>
          <span class="show-for-sr">Current: </span> <?php echo $restaurant_info['name'] ?>
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      <img class="thumbnail" width="650px" height="350px" src="data:image/jpeg;base64,<?php echo $restaurant_info['photo'] ?>">
    </div>
    <div class="medium-6 large-5 columns">
      <h3> <?php echo $restaurant_info['name'] ?> </h3>
      <h5 style="color: #7f8c8d;"> <?php echo $restaurant_info['type'].' - '.$restaurant_info['location'] ?> </h5>
      <p> <?php echo $restaurant_info['description'] ?> </p>
      <br>
      <div class="row">
        <div class="small-3 columns">
          <h5>Taste</h5>
          <h3> <?php echo number_format($restaurant_info['taste'], 1) ?> </h3>
        </div>
        <div class="small-3 columns">
          <h5>Service</h5>
          <h3> <?php echo number_format($restaurant_info['service'], 1) ?> </h3>
        </div>
        <div class="small-3 columns">
          <h5>Place</h5>
          <h3> <?php echo number_format($restaurant_info['place'], 1) ?> </h3>
        </div>
        <div class="small-3 columns">
          <h5>Money</h5>
          <h3> <?php echo number_format($restaurant_info['vom'], 1) ?> </h3>
        </div>
      </div>
      <br><br>
      <a href="http://<?php echo $restaurant_info['site_link'] ?>" target="_blank" class="button large expanded">Επίσκεψη Ιστοσελίδας</a>

      <?php if ($restaurant_info['created_by'] == $_SESSION['u_id']) { ?>
        <form action="./index.php?page=user" method="POST">
          <input type="hidden" name="r_id" value="<?php echo $restaurant_info['id'] ?>"/>
          <input type="submit" class="button large expanded hollow" name="delete_restaurant" value="Διαγραφή Εστιατορίου" />
        </form>

      <?php } ?>

    </div>
  </div>
  <div class="column row">
    <hr>
    <ul class="tabs" data-tabs id="example-tabs">
      <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Κριτικές</a></li>
      <li class="tabs-title"><a href="#panel2">Δημιουργία κριτικής</a></li>
    </ul>
    <div class="tabs-content" data-tabs-content="example-tabs">
      <div class="tabs-panel is-active" id="panel1">

        <?php foreach ($reviews as $review): ?>

            <div class="media-object stack-for-small" id="review-<?php echo $review['r_id'] ?>" style="width: 700px;">
              <div class="media-object-section">
                <center>
                  <img class="thumbnail" width="130" height="130" src="data:image/jpeg;base64,<?php echo $review['photo'] ?>"/>
                  <h6> <?php echo $review['username'] ?> </h6>
                </center>
              </div>
              <div class="media-object-section" style="position: relative; left: 30px;">
                <div class="row">
                  <div class="small-3 columns">
                    <h5>Taste</h5>
                    <h3> <?php echo number_format($review['taste_score'], 1) ?> </h3>
                  </div>
                  <div class="small-3 columns">
                    <h5>Service</h5>
                    <h3> <?php echo number_format($review['service_score'], 1) ?> </h3>
                  </div>
                  <div class="small-3 columns">
                    <h5>Place</h5>
                    <h3> <?php echo number_format($review['place_score'], 1) ?> </h3>
                  </div>
                  <div class="small-3 columns">
                    <h5>Money</h5>
                    <h3> <?php echo number_format($review['vom_score'], 1) ?> </h3>
                  </div>
                </div>
                <br>
                <h5 style="color: #7f8c8d;">Κριτική</h5>
                <p> <?php echo $review['description'] ?> </p>
              </div>
            </div>
            <hr>

          <?php endforeach; ?>
      </div>

      <div class="tabs-panel" id="panel2">

        <?php if ($is_logged_in && $restaurant_info['created_by'] != $_SESSION['u_id']) { ?>

          <div style="width: 700px;">

          <h4>Κάνε και εσυ την κριτική σου!</h4>

          <form action="./index.php?page=restaurant&id=<?php echo $restaurant_info['id'] ?>" method="POST">

          <label>Taste
            <select name="taste">
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
            </select>
          </label>
          <label>Service
            <select name="service">
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
            </select>
          </label>
          <label>Place
            <select name="place">
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
            </select>
          </label>
          <label>Value of money
            <select name="vom">
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
            </select>
          </label>
          <label>
          Σχόλια
          <textarea placeholder="Γράψε τα σχόλια σου εδώ..." name="description" style="height: 200px;"></textarea>
          </label>
          <input type="submit" name="create_review" value="Υποβολή κριτικής" class="button"/>
        </form>
        </div>



        <?php } else { ?>

          <?php if ($is_logged_in) { ?>

            <center>
              <h5>Επειδή είστε ο ιδιοκτήτης του εστιατορίου δεν επιτρέπεται να καταχωρήσετε κάποια κριτική!</h5>
            </center>

          <?php } else { ?>

            <center>
              <h5>Κάντε <a href="./index.php?page=user&action=login">σύνδεση</a> ή <a href="/index.php?page=user&action=register">εγγραφή</a></h5>
            </center>

          <?php } ?>

        <?php } ?>

        <div class="row medium-up-3 large-up-5">



        </div>
      </div>
    </div>
  </div>
  <br><br>

  </footer>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
