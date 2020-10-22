<?php
  require('../../../config/config.php');
  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $restemail = $_SESSION['rest_id'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    $query = "INSERT INTO food(name, restemail, price, category)
              VALUES('$name','$restemail','$price','$cat')";
    if(mysqli_query($conn, $query)){
      header('Location: '.'http://localhost/sandbox/Foodshala/restaurant/dashboard/inventory.php'.'');
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
    <link rel="icon" href="../../../assets/title.png">

    <title>Add food</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="register.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Add food item</h1>
      <label for="inputName" class="sr-only">Food item name</label>
      <input type="text" name="name" id="inputName" class="form-control" placeholder="Food item name" required autofocus>
      <label for="inputPrice" class="sr-only">Price</label>
      <input type="text" name="price" id="inputPrice" class="form-control" placeholder="Price" required autofocus>
      <select class="form-control" name="cat" id="cat">
        <option value="" disabled selected>Select category</option>
        <option value="veg">Veg</option>
        <option value="non">Non-Veg</option>
      </select>
      <div><br></div>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Submit" name="submit">
    </form>
  </body>
</html>