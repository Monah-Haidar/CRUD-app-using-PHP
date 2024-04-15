<?php

spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('./lib/' . $className . '.php');
});


$data = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'purpose' => $_POST['purpose'],
    'comments' => $_POST['comments']
];



try{
    $db = new \Core\Database();
    $contact = new \Core\Contact($db->getDbHandle());
    $info = $contact->insert($data);
    print "New record created successfully" . "<br/>"; 

}catch(\PDOExeption $e){
    print "An error occured while connecting to DB. Error is: " . $e->getMessage();
}



?>

