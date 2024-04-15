<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Add a New Team</title>
</head>
<body>
    <div id="formcontainer">
        <h1>Add a New Team</h1>
        <form action="/admin/teams/insert.php" method="post" enctype="multipart/form-data">
            <label>Name: <input type="text" name="name"></label> <br />
            <label>Rank: <input type="number" name="rank"></label> <br />
            <label>Logo: <input type="file" name="logo"></label> <br />
            <input type="submit" value="Submit...">
            <input type="reset" value="reset">
        </form>
    </div>

</body>
</html>