<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess The Number</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4456/4456774.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="style.jeu.css" rel="stylesheet">
</head>
<body>
<body>
    <!--<?php session_start();?>-->
<div class="formulaire ">
<h1>Guess The Number</h1>
<div class="account-type">
    <p> <i class="glyphicon glyphicon-user"></i> <span><?=  $_SESSION['name']?></span>
    <br>
    <p > The difficulty : <span> <?= $_SESSION['level'] ?> </span>
    <hr>
    <hr> 
    <form action="guess.php" method="post" style="text-align: center;">
        <input type="number" placeholder="Entrez votre chiffre !"  disabled="disabled" name="chiffre"  value="<?php if(isset ($_SESSION['Chiffre'])){ echo $_SESSION['chiffre'];} ?>"/><br>
        <div class="btn-block">
            <input type="Submit" value="Restart" name="Restart"/>
        </div>
</form>
<div> 
    <p><span><?php if(!isset($_POST["chiffre"])){echo  $_SESSION["S"];}?></span></p>
    <hr>
    <p >You Still Have :<span> <?=$_SESSION['reste'] ?></span></p>
    <hr>
    <p>Score :<span> <?php echo $_SESSION["score"]  ?></span></p>
</div>
</body>
</html>

