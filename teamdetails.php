<?php
spl_autoload_register(function ($className){
   $className = str_replace('\\' , '/' , $className);
   require_once('./lib/' . $className . '.php');
});

try{
   $db= new \Core\Database();
}catch (\PDOExeption $e){
   print "An error occured while connecting to DB. Error is: " . $e->getMessage();
}

$id = $_GET['id'];

$player = new \Fifa\Players($db->getDbHandle());
$playerData = $player->get($id);

$team = new \Fifa\Teams($db->getDbHandle());
$teamData = $team->get($id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/style.css">
   <title>Player Details</title>
</head>
<body>
   <div id="carouselcontainer"> 
      <div id="teamdetails">
      <?php

         print "<ul>";
         print "<img src= \"/assets/teams/logos/{$teamData['Team']->logo}\" alt=\"\"> <br/>";
         print "</ul>";

         print "<ul>";
         print "Team Name: " . $teamData['Team']->name . "<br/>";
         print "</ul>";

         print "<ul>";
         print "Word Rank: " . $teamData['Team']->rank . "<br/>";
         print "</ul>";


      ?>
      </div>
   <h2>List of Players</h2> 
      <ul>
         <?php
            foreach($playerData['playerDetails'] as $entry){
               print "<li>";               
               print "<img src= \"/assets/teams/players/{$entry->photo}\" alt=\"\"> <br/>";
               print "{$entry->name} <br/>";
               print "</li>";
            }
         ?>
      </ul> 
   </div>

</body>
</html>

