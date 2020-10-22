<?php
  require('../../config/config.php');
  $id = $_SESSION['ordid'];
  $query = "SELECT * FROM foodorder WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  $order = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/title.png">

    <title>Order</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>

  <body>
    <div>
      <br><br><br><br>
    </div>
    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Order placed successfully!</h1>
        <p class="lead">Hey <?php echo $order['custname']; ?>, your order has been placed.<br>
        Order ID: <?php echo $order['id']; ?><br>
        Total: Rs.<?php echo $order['price']; ?></p>
        <a class="btn btn-lg btn-primary" href="../menu/index.php" role="button">Return to menu &raquo;</a>
      </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
