<?php
spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});

$db= new \Core\Database();
$contact = new \Core\Contact($db->getDbHandle());
$res = $contact->getAll();

if ($res === false) die("Cannot Retreive Contacts");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>List Of All Contacts</title>
</head>
<body>
    <h1>List Of All Contacts</h1>
    <div id="contactscontainer">
        <ul>
            <?php
            foreach($res as $contact){
                print "<li>";
                print "Name: {$contact->name}" . "<br />"; 
                print "id: {$contact->id}" . "<br />";
                print "Email: {$contact->email}" . "<br />"; 
                print "Phone: {$contact->phone}" . "<br />";
                print "<a href=\"delete.php?id={$contact->id}\" alt=\"\">Delete Contact</a>" . "<br />";
                print "</li>";
            }

            ?>
        </ul>
    </div>
</body>
</html>