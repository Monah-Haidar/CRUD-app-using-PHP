<?php
spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});

print_r($_POST);
print_r($_FILES);

try{
    $db= new \Core\Database();
}catch (\PDOExeption $e){
    print "An error occured while connecting to DB. Error is: " . $e->getMessage();
}

$logoName = uniqid() . "_" . $_FILES['logo']['name'];

$data = [
    'name' => $_POST['name'],
    'rank' => $_POST['rank'],
    'logo' => $logoName
];

$teams = new \Fifa\Teams($db->getDbHandle());
$t = $teams->insert($data);

if ($t === false) die ("Could not insert data");

move_uploaded_file($_FILES['logo']['tmp_name'], '../../assets/teams/logos/' . $logoName);


print "success";


header("Location: ./index.php");

?>