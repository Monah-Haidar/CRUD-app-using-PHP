<?php

spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});


$db= new \Core\Database();
$team = new \Fifa\Teams($db->getDbHandle());

$teamData = $team->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/style.css">
   <title>Home Page</title>
</head>

<body>
   <h1 class="title">TEAMS</h1><hr/>

   <!-- <div id="menucontainer">
      <ul>
         <li><a href="#"><img src="/assets/menucontainer/menu.jpg"></a></li>
      </ul>
      <h1>2022 FIFA World Cup Qatar</h1>
   </div> -->

   <div id="carouselcontainer">
      <h2></h2>
      <ul> 
         <?php
         foreach($teamData as $entry){
            print "<li>";
            print "<a href=\"../../teamdetails.php?id={$entry->id}\"><img src= \"../../assets/teams/logos/{$entry->logo}\" alt=\"\"></a> <br/>";
            print "<a href=\"../../teamdetails.php?id={$entry->id}\">{$entry->name}</a> <br/>";
            print "<a href=\"edit.php?id={$entry->id}\">Edit Team</a> <br/>";
            print "<a href=\"delete.php?id={$entry->id}\">Delete Team</a> <br/>";
            print "</li>";
         }
         print "<li>";
         print "<a href=\"add.php\"><img src=\"../../assets/teams/logos/newteam.png\"></a> <br/>";
         print "<a href=\"add.php\">Add Team</a> <br/>";
         print "</li>";
         ?>

      </ul>
   </div>

</body>

</html>