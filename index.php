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

$team = new \Fifa\Teams($db->getDbHandle());
$data = $team->getAll();

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
   <h1 class="title">FIFA World Cup</h1><hr/>

   <div id="menucontainer">
      <ul>
         <li><a href="#"><img src="/assets/menucontainer/menu.jpg"></a></li>
      </ul>
      <h1>2022 FIFA World Cup Qatar</h1>
   </div>

   <div id="carouselcontainer">
      <h2>Teams:</h2>
      <ul> 
         <?php
         foreach($data as $entry){
            print "<li>";
            print "<a href=\"teamdetails.php?id={$entry->id}\"><img src= \"/assets/teams/logos/{$entry->logo}\" alt=\"\"></a> <br/>";
            print "<a href=\"teamdetails.php?id={$entry->id}\">{$entry->name}</a> <br/>";
            print "</li>";
         }
         ?>
      </ul>
   </div>
   <div id="formcontainer">
      <h1>Contact Us:</h1>
      <form action="/savecontact.php" method="post">
         <label>Name: <input type="text" name="name" value="" required></label><br/>
         <label>Email: <input type="email" name="email" value="" required></label><br/>
         <label>Phone Number: <input type="text" name="phone" value="" required></label><br/>
         <label>Purpose:
            <select name="purpose">
               <option>Feedback</option>
               <option>Support</option>
               <option>Question</option>
               <option>Problem</option>
               <option>General</option>
            </select>
         </label><br/>
         <label>Comments: <br/>
            <textarea name="comments" rows="10" cols="40"></textarea>
         </label><br/>
         <input type="submit" value="Submit...">
         <input type="reset" value="Reset">
      </form>
   </div>  
</body>

</html>