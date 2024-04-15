<?php
session_start();
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];

spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../admin/' . $className . '.php');
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
        print '<h1> Welcome to your dashboard ' . $user . '</h1>';
    ?>

    <div id="links">
        <a href="./teams/index.php" alt="">Teams index </a> <br />
        <a href="./contacts/index.php" alt="">Contacts index </a>
    </div>
</body>
</html>