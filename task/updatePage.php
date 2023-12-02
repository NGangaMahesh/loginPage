<?php
session_start();
include 'dbconnect.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "Session not set or login is not true. Redirecting to login page...";
    header("Location: loginPage.php");
    exit();
}

$tableName = 'users';
$searchEmail = $_SESSION['email'];
$query = "SELECT * FROM $tableName WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phno = mysqli_real_escape_string($conn, $_POST["phno"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $profession = mysqli_real_escape_string($conn, $_POST["profession"]);
    session_start();
    $email = $_SESSION['email'];
    $stmt = mysqli_prepare($conn, "UPDATE `users` SET `phno`=?, `age`=?, `dob`=?, `profession`=? WHERE `email`=?");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $phno, $age, $dob, $profession, $email);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("location: updatePage.php");
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="updateContainer p-3 m-0 border-0 bd-example m-0 border-0">
        <div class="profileContainer">
            <img class="avatarIcon" src="https://i.pinimg.com/564x/7e/c9/c7/7ec9c7f4ac40e570ce7b3e17d33acec0.jpg" />
            <?php if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $searchEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<h3 class="userName m-1">' . $row['name'] . '</h3>';
                        echo '<div class="details mt-4">';
                        echo '<p class="values"><span class="keys">Email: </span>' . $row['email'] . '</p>';
                        echo '<p class="values"><span class="keys">Gender: </span>' . $row['gender'] . '</p>';
                        echo '<p class="values"><span class="keys">College Name: </span>' . $row['clgname'] . '</p>';
                        echo '<p class="values"><span class="keys">Branch: </span>' . $row['branch'] . '</p>';
                        echo '<p class="values"><span class="keys">PhoneNo: </span>' . ($row['phno'] !== 0 ? $row['phno'] : 'Please update Profile') . '</p>';
                        echo '<p class="values"><span class="keys">Age: </span>' . ($row['age'] !== 0 ? $row['age'] : 'Please update Profile') . '</p>';
                        echo '<p class="values"><span class="keys">Profession: </span>' . ($row['profession'] !== '' ? $row['profession'] : 'Please update Profile') . '</p>';

                    }
                } else {
                    echo "Error fetching result: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error in prepared statement: " . mysqli_error($conn);
            } ?>
            <a class="goback" href="mainPage.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg> Go Back</a>
        </div>
    </div>
    <div class="formContainer">
        <h1 class="updateText ml-5">Update Your Profile</h1>
        <form class="row g-3 mt-3" id="updateFormValidation" method="POST" action="updatePage.php">
            <div class="col-md-6">
                <label for="validationServerPhNum" class="form-label">Phone Number</label>
                <input type="number" class="form-control" name="phno" id="validationServerPhNum" required="">
            </div>
            <div class="col-md-6">
                <label for="validationServerAge" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" id="validationServerAge" required="">
            </div>
            <div class="col-md-6">
                <label for="validationServerDate" class="form-label">Date OF Birth</label>
                <input type="text" class="form-control" name="dob" id="validationServer" required="">
            </div>

            <div class="col-md-6">
                <label for="validationServerProf" class="form-label">Profession</label>
                <input type="text" class="form-control" name="profession" id="validationServerProf" required="">
            </div>
            <div class="col-12">
                <button class="btn btnSignup" type="submit">Submit</button>
            </div>
        </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/updatePage.js"></script>
</body>

</html>