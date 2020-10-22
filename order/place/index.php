<?php
  require('../../config/config.php');
  $id = $_SESSION['foodid'];
  $query = "SELECT * FROM food WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  $fooditem = mysqli_fetch_assoc($result);
  if(isset($_POST['cancel'])) {
    header('Location: '.'http://localhost/sandbox/Foodshala/order/menu/index.php'.'');
  }
  if(isset($_POST['place'])) {
    $restemail = $fooditem['restemail'];
    $custemail = $_SESSION['custemail'];
    $query = "SELECT name FROM customer WHERE email='$custemail'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);

    $custname = $result['name'];
    $price = $fooditem['price'];
    $query = "INSERT INTO foodorder (custname, price, restemail, foodid) VALUES ('$custname', '$price', '$restemail', '$id')";
    if(mysqli_query($conn, $query)){
      $query = "SELECT LAST_INSERT_ID()";
      $result = mysqli_query($conn, $query);
      $result = mysqli_fetch_assoc($result);
      $_SESSION['ordid'] = $result['LAST_INSERT_ID()'];
      header('Location: '.'http://localhost/sandbox/Foodshala/order/confirmation/index.php'.'');
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/title.png">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <h1>Place your order</h1>
      <hr>
      <h3 class="h3 mb-3 font-weight-normal"><?php echo $fooditem['name']; ?></h3>
      <h3 class="h3 mb-3 font-weight-normal">Price: <?php echo $fooditem['price']; ?></h3>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Place Order" name="place">
      <input type="submit" class="btn btn-lg btn-danger btn-block" value="Cancel" name="cancel">
    </form>
  </body>
</html>
