<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess The Number</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4456/4456774.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="style.jeu.css" rel="stylesheet">
</head>
<body>
<?php 
session_start();

?>
<div class="formulaire ">
<h1>Guess The Number</h1>
<form method="post" action ="guess.php">
    <div class="account-type">
        <input type="text" name="name" id="name" placeholder="User Name" value="<?php if(isset ($_SESSION['name'])){ echo $_SESSION['name'];} ?>"  required/>
        <hr>
        <input type="radio" value="Easy" id="Easy" name="level" checked/>
        <label for="Easy" class="radio">Easy (1-10) with 5 guesses</label>
        <br> 
        <input type="radio" value="Meduim" id="Meduim" name="level" />
        <label for="Meduim" class="radio">Meduim (1-50) with 10 guesses</label>
        <br>
        <input type="radio" value="Hard" id="Hard" name="level" />
        <label for="Hard" class="radio">Hard (1-100) with 20 guesses</label>
        <br> 
        <hr><hr><hr>
    <div class="btn-block">
        <input type="Submit" value="Envoyez !" name="Sub"/>
    </div>
    </div>
</form>
<div>

</body>
</html>