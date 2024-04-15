<?php
spl_autoload_register(function ($className){
    $className = str_replace('\\' , '/' , $className);
    require_once('../../lib/' . $className . '.php');
});

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Edit a Team</title>
</head>
<body>

    <?php
    $db= new \Core\Database();
    $t = new \Fifa\Teams($db->getDbHandle());

    $teams = $t->getAll();
    ?>


    <div id="formcontainer">
        <h1>Edit a Team</h1>
        <form action="/admin/teams/update.php" method="post" enctype="multipart/form-data">
            
            <label>ID: 
                <select name="id"> 
                    <?php
        
                    print <<< CSCS
                    <option value="{$id}">{$id}</option>
                    CSCS;
                
                    ?>
                </select>
            </label> <br />

            <label>Name: <input type="text" name="name"></label> <br />
            <label>Rank: <input type="number" name="rank"></label> <br />
            <label>Logo: <input type="file" name="logo"></label> <br />

            <input type="submit" value="Submit...">
            <input type="reset" value="reset">
        </form>
    </div>
</body>
</html>