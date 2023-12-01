<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'dbconnect.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "Session not set or login is not true. Redirecting to login page...";
    header("Location: loginPage.php");
    exit();
}

$tableName = 'users';
$searchEmail = $_SESSION['email'];
$query = "SELECT * FROM $tableName WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);


if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $searchEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<header class="heading">';
            echo '<nav class="navbar bg-body-tertiary">';
            echo '<div class="container-fluid">';
            echo '<h1 class="navbar-brand">  Hello ' . $row['name'] . '</h1>';
            echo '<div class="updateClick">';
            echo '<a class="updateText" href="updatePage.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">';
            echo '<path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l-.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 0-.92.382l-.045.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>';
            echo '</svg> Update Profile</a>';
            echo '</div>';
            echo '</div>';
            echo '</nav>';
            echo '</header>';
        }
    } else {
        echo "Error fetching result: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error in prepared statement: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="js/mainPage.js" defer></script>
</head>
<body>
    <div class="mainPageContainer mt-5">
        <h1 class="learnText">Learn Web Technology</h1>
        <div class="techContainer">
            <div class="card" style="width: 18rem;">
                <img src="https://play-lh.googleusercontent.com/RslBy1o2NEBYUdRjQtUqLbN-ZM2hpks1mHPMiHMrpAuLqxeBPcFSAjo65nQHbTA53YYn" class="card-img-top lanImg" alt="htmlImg">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Hyper Text Markup Language</h6>
                  <p class="card-text">Skeleton of web pages, defines structure and content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img src="https://play-lh.googleusercontent.com/RTAZb9E639F4JBcuBRTPEk9_92I-kaKgBMw4LFxTGhdCQeqWukXh74rTngbQpBVGxqo" class="card-img-top lanImg" alt="cssImg">
                <div class="card-body">
                  <h5 class="card-title">Cascading Style Sheets</h5>
                  <p class="card-text">Styles web pages, controls appearance and layout.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/640px-JavaScript-logo.png" class="card-img-top lanImg" alt="JavaScriptImg">
                <div class="card-body">
                  <h5 class="card-title">JavaScript</h5>
                  <p class="card-text">Adds interactivity to web pages, makes things dynamic.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img src="https://ih1.redbubble.net/image.439203190.3965/st,small,507x507-pad,600x600,f8f8f8.u4.jpg" class="card-img lanImg" alt="phpImg">
                <div class="card-body">
                  <h5 class="card-title">Hypertext Preprocessor</h5>
                  <p class="card-text">Server-side scripting language, handles data and logic.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img src="https://www.brcline.com/wp-content/uploads/2016/01/bootstrap-logo.png" class="card-img-top lanImg" alt="bootstrapImg">
                <div class="card-body">
                  <h5 class="card-title">Bootstrap</h5>
                  <p class="card-text">CSS framework, simplifies web development, prebuilt components.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
</body>
</html>