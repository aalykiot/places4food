<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Places4food | Κριτικές</title>
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
        <li><a href="./index.php?page=home">Αρχική</a></li>
        <li><a href="./index.php?page=restaurant">Εστιατόρια</a></li>
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

  <div class="callout large primary">
    <div class="row column text-center">
      <h1>Κριτικές για εστιατόρια</h1>
    </div>
  </div>
  <div class="row" id="content">
    <center>
    <div class="medium-9">
      <br>

      <?php foreach ($reviews as $review): ?>

        <div class="blog-post" style="background: #ecf0f1;padding: 20px;margin-bottom: 30px;border-left: 4px solid #7f8c8d;">
          <h3>Για το <a href="./index.php?page=restaurant&id=<?php echo $review['restaurant_id'] ?>"><?php echo $review['name'] ?> </a> <small style="color: #2c3e50;opacity: 0.7;"><?php echo $review['username'] ?></small></h3>
          <p> <?php echo $review['description'] ?></p>
          <div class="callout">
            <ul class="menu simple">
              <div class="row">
                <div class="small-3 columns">
                  <h6>Taste</h5>
                  <h4> <?php echo number_format($review['taste_score'], 1) ?> </h4>
                </div>
                <div class="small-3 columns">
                  <h6>Service</h6>
                  <h4> <?php echo number_format($review['service_score'], 1) ?> </h4>
                </div>
                <div class="small-3 columns">
                  <h6>Place</h6>
                  <h4> <?php echo number_format($review['place_score'], 1) ?> </h4>
                </div>
                <div class="small-3 columns">
                  <h6>Money</h6>
                  <h4> <?php echo number_format($review['vom_score'], 1) ?> </h4>
                </div>
              </div>
            </ul>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </center>

  </div>

  <script src="bower_components/jquery/dist/jquery.js?hash=c49047dde69a9cb7a50ca40493937357"></script>
  <script src="bower_components/what-input/what-input.js?hash=7bb7fea252899152ca0173913a02f1eb"></script>
  <script src="bower_components/foundation-sites/dist/foundation.js?hash=91fea43a73487cc87eaf15f88cfe1529"></script>
  <script src="js/app.js?hash=69ec9e4a5c39f580d627486494fdbb8c"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
  $(document).foundation();
</script>
</body>

</html>
