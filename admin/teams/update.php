<?php
// update the team data provided by edit.php
spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});

$db= new \Core\Database();
$team = new \Fifa\Teams($db->getDbHandle());

$logoName = uniqid() . "_" . $_FILES['logo']['name'];

$data = [
    'name' => $_POST['name'],
    'rank' => $_POST['rank'],
    'logo' => $logoName,
    'id' => $_POST['id']
];

$res = $team->update($data);

if ($res === false) die("Cannot update team");

move_uploaded_file($_FILES['logo']['tmp_name'], '../../assets/teams/logos/' . $logoName);

print "success";

header("Location: ./index.php");
