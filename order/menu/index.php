<?php
  require('../../config/config.php');
  if(isset($_GET['id'])) {
    if(isset($_SESSION['custemail'])) {
      $_SESSION['foodid'] = $_GET['id'];
      header('Location: '.'http://localhost/sandbox/Foodshala/order/place/index.php'.'');
    } else {
      header('Location: '.'http://localhost/sandbox/Foodshala/customer/sign-in/index.php'.'');
    }
  }

  $query = "SELECT * FROM food";
  $result = mysqli_query($conn, $query);
  $fooditems = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if(isset($_SESSION['custemail'])) {
    $email = $_SESSION['custemail'];
    $query = "SELECT pref FROM customer WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
    $category = $result['pref'];
    if($category == 'veg') {
      $query = "SELECT * FROM food where category='$category'";
    } else {
      $query = "SELECT * FROM food";
    }
    $result = mysqli_query($conn, $query);
    $fooditems = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/title.jpg">

    <title>Menu</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="../../cover/index.php" class="navbar-brand d-flex align-items-center">
            <strong>Foodshala (logout)</strong>
          </a>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Today's Menu</h1>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
          <?php foreach($fooditems as $fooditem): ?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <h3><?php echo $fooditem['name']; ?></h3>
                  <p class="card-text">
                    Restaurant: <?php echo $fooditem['price']; ?>
                    <br>
                    Category: <?php if($fooditem['category'] == 'veg'){echo 'Veg';} else{echo 'Non-veg';} ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button class="btn btn-sm btn-outline-secondary" onclick="location.href='index.php?id=<?php echo $fooditem['id']; ?>'" type="button">Place Order</button>
                    </div>
                    <small class="text-muted">Rs. <?php echo $fooditem['price']; ?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
