<?php
$login=0;
$invalid=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user already exists
    $sql = "SELECT * FROM `registration` WHERE username='$username' and password='$password' ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            //echo "Login Successful!!";
            $login=1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        } else {
            //echo "Invalid data";
            $invalid= 1;
        }
}
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>


<?php
if($login)
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Succeessful!</strong> You are successfully logged in!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
?>


<?php
if($login)
   echo '<div class="alert alert-danfer alert-dismissible fade show" role="alert">
  <strong>Error!!</strong>Invalid Credentials!!!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
?>

    <h1 class="text-center">Log in to our website!!</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>