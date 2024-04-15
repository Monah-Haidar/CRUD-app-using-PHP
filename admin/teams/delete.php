<?php
spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});

$id = $_GET['id'];

$db= new \Core\Database();
$team = new \Fifa\Teams($db->getDbHandle());
$res = $team->delete($id);

if ($res === false) die("Cannot Delete Team");

print "Deleted Successfully";

header("Location: ./index.php");