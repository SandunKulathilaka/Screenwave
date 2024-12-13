
<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScreenWave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="headings">
    <h1>Admin Panel</h1>
    <a class="btn btn-primary" href="users.php" target="user">User Management</a>
    <a class="btn btn-primary" href="movie.php" target="user">Movie Management</a>
    <a class="btn btn-primary" href="booking.php" target="user">Booking Management</a>
    <a class="btn btn-primary" href="contact.php" target="user">Contact Request</a>
    <div style="width:280px;"></div>
    <button class="btn btn-success">Welcome <?php echo $_SESSION['firstName']; ?></button>
    <a class="btn btn-success" href="/MovieSite/dashboard.php">Dashboard</a>
</div>
<div class="iframes">
    <iframe src="users.php" name="user" title="Iframe Example"width="100%" height="100%"></iframe>
</div>

<div class="footer">
    <h4>2023 CinemePlex</h4>
</div>

</body>
</html>

