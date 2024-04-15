<?php
spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});

$id = $_GET['id'];

$db= new \Core\Database();
$contact = new \Core\Contact($db->getDbHandle());
$res = $contact->delete($id);

if ($res === false) die("Cannot Delete Contact");

print "Deleted Successfully";

header("Location: ./index.php");