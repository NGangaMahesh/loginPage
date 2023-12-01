<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["usrpassword"];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        header("location: mainPage.php");
    }
    else{
        $showError = "INvalid Credentials";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Login Page</title>
</head>
<body>
  <?php
  if ($login){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    your login
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
   ?>
<div class="loginContainer">
    <div class="welcomeContainer">
        <h1 class="welcomeGreet">Welcome Back</h1>
        <img class="img" src="https://i.pinimg.com/564x/df/d2/9c/dfd29c1d79a2479f10f93d6c070de5c3.jpg" />
    </div>
    <div class="formContainer m-3">
        <h2 class="loginHeading">Login</h2>
        <p class="loginAccount">Don't have an account? <a class="signUpText" href="signupPage.php">Signup</a></p>
        <form class="formBox" action="loginPage.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" id="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" id="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="usrpassword">
            </div>
            <button type="submit" class="btn btnLogin">Login</button>
        </form>
    </div>
</div>

</body>
</html>
