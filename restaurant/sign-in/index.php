<?php
  require('../../config/config.php');
  if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $query = "SELECT pwd FROM restaurant
              WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
    if($result['pwd'] == md5($_POST['pwd'])) {
      $_SESSION['rest_id'] = $email;
      header('Location: '.'http://localhost/sandbox/Foodshala/restaurant/dashboard/inventory.php'.'');
    } else {
      echo "NO SUCH USER EXISTS!";
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
    <link rel="icon" href="../../assets/title.jpg">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <img class="mb-4" src="../../assets/title.jpg" alt="" width="108" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
      <div>
        <p>New to Foodshala? <a href="../register/index.php">Register</a></p>
      </div>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Submit" name="submit">
    </form>
  </body>
</html>
