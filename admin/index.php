<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Log in</title>
</head>
<body>
    
    <div id="logincontainer">
        <h2>Fill In Username and Password</h2>
        <form action="/admin/login.php" method="post">
            <label>Username: <input type="text" name="user" value="monah" required> <br />
            <label>Password: <input type="password" name="pass" value="Computerscience" required> <br />
            <input type="submit" value="Sumbit">
            <input type="reset" value="Reset">
        </form>
    </div>
    
    <?php
    session_start();

    if (isset($_SESSION['error_message'])) {
    print '<p>' . $_SESSION['error_message'] . '</p>';

    unset($_SESSION['error_message']);
    }

    ?>

</body>
</html>
