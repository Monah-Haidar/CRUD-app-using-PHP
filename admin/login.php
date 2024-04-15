<?php
session_start();

spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../lib/' . $className . '.php');
});

$db= new \Core\Database();
$admin = new \Core\Admin($db->getDbHandle());

$user = $_POST['user']; // monah
$pass = $_POST['pass']; // Computerscience

$res = $admin->getUser($user);

if ($res === false) die('ERROR');

$hashedPass = $res['Admin']->password; // unhashed password is Computerscience

if(($user != $res['Admin']->user) || (!password_verify($pass, $hashedPass))){
    header("Location: /admin/index.php");
    $_SESSION['error_message'] = "Your credentials are wrong. Please try again.";
}else{
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    header("Location: /admin/dashboard.php");
}



?>