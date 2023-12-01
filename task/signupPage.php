<?php
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["usrpassword"];
    $gender = $_POST["gender"];
    $clgname = $_POST["clgname"];
    $branch = $_POST["branch"];
    $exists = false;
    if ($exists == false) {
        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `gender`, `clgname`, `branch`, `date`) VALUES ('$username', '$email', '$password', '$gender', '$clgname', '$branch', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            header("location: loginPage.php");
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
    else{
        echo 'Error';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Your Account is Created!
    </div>';
    }
    ?>
    <div class="signUpContainer p-3 m-0 border-0 bd-example m-0 border-0">
        <div class="registrationContainer">
            <img class="img" src="https://i.pinimg.com/564x/31/66/20/316620a1b866377cc981b606bba34b28.jpg" />
        </div>
        <div class="formContainer">
            <h1 class="signupHeading">Sign up</h1>
            <p class="messageAccount">Already have an account? <a class="signUpText" href="loginPage.php">Login</a></p>
            <form class="row g-3" method="POST" action="signupPage.php">
                <div class="col-md-6">
                    <label for="validationServerFullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="validationServerFullName" required="">
                </div>
                <div class="col-md-6">
                    <label for="validationServerEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="validationServerEmail" required="">
                </div>
                <div class="col-md-6">
                    <label for="validationServerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="usrpassword" id="validationServerPassword" required="">
                </div>
                <div class="col-md-6">
                    <label for="validationServerGender" class="form-label">Gender</label>
                    <input type="text" class="form-control" name="gender" id="validationServerGender" required="">
                </div>
                <div class="col-md-6">
                    <label for="validationServerCollege" class="form-label">College Name</label>
                    <input type="text" class="form-control" name="clgname" id="validationServerCollege" required="">
                </div>
                <div class="col-md-6">
                    <label for="validationServerBranch" class="form-label">Branch</label>
                    <input type="text" class="form-control" name="branch" id="validationServerBranch" required="">
                </div>
                <div class="col-12">
                    <button class="btn btnSignup" type="submit" >Sign up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
