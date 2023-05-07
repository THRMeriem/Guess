<?php

session_start();
if (isset($_POST['Sub'])) 
    {
        unset($_SESSION["nombres"]);
        unset( $_SESSION["rand"]);
        unset($_SESSION["essai"]);
        if (isset($_POST['level']) && !empty($_POST['level']) && isset($_POST['name']) && !empty($_POST['name']))
        {
            $_SESSION['name']=$_POST['name'];
            $_SESSION['level']=$_POST['level'];
            if ($_POST['level']=="Easy")
            {
                $_SESSION["lim"]=10;
                $_SESSION["note"]=4;
                $_SESSION["tentative"]=5;
            }
            elseif ($_POST['level']=="Meduim")
            {
                $_SESSION["lim"]=50;
                $_SESSION["note"]=2;
                $_SESSION["tentative"]=10;
            }
            elseif ($_POST['level']=="Hard")
            {
                $_SESSION["lim"] =100;
                $_SESSION["note"]=1;
                $_SESSION["tentative"]=20;
            }
       }
    }
    if(!isset($_SESSION["rand"]) && ["essai"] && ["nombres"])
    {
        $_SESSION["rand"] = rand(1,  $_SESSION["lim"]);
        $_SESSION["essai"] = 0;
        $_SESSION["score"] = 20;
        $_SESSION["nombres"] = [];
        $_SESSION['reste']=$_SESSION["tentative"];
    }
if($_SESSION["essai"] <= $_SESSION["tentative"]-2) 
{
    
    if (isset($_POST["chiffre"]))
    {
        $_SESSION["chiffre"]=$_POST["chiffre"];
            if($_POST["chiffre"] < $_SESSION["rand"]) 
            {
                $_SESSION["R"]= "Your guess is too low!";
                $_SESSION["nombres"][] += $_POST["chiffre"];
                $_SESSION["essai"]++;
                $_SESSION['reste']= $_SESSION['reste']-1;
                $_SESSION["score"] = $_SESSION["score"] -$_SESSION["note"];
            }
            else if($_POST["chiffre"] > $_SESSION["rand"]) 
            {
                $_SESSION["R"]= " Your guess is too high!";
                $_SESSION["nombres"][] += $_POST["chiffre"];
                $_SESSION["essai"]++;
                $_SESSION['reste']= $_SESSION['reste']-1;
                $_SESSION["score"] = $_SESSION["score"] -$_SESSION["note"];
            }
                    else 
                        {
                            $_SESSION["S"]= "You guessed the number!";
                            unset($_SESSION["nombres"]);
                            unset( $_SESSION["rand"]);
                            unset($_SESSION["essai"]);
                            $_SESSION['reste']= $_SESSION['reste']-1;
                            $_SESSION["rand"] = rand(1,  $_SESSION["lim"]);
                            $_SESSION["nombres"] = []; 
                            $_SESSION["essai"] = 0;
                            header('Location: fin_jeu.php');
                            exit();
                        }
    }
}    

else {
    $_SESSION["S"]= " You have no more tries left!"; 
    unset($_SESSION["nombres"]);
    unset( $_SESSION["rand"]);
    $_SESSION['reste']= $_SESSION['reste']-1;
    unset($_SESSION["essai"]);
    $_SESSION["rand"] = rand(1,  $_SESSION["lim"]);
    $_SESSION["nombres"] = [];
    $_SESSION["essai"] = 0;
    header('Location: fin_jeu.php');
    exit();
}


if (isset($_POST['Restart']))
{
    unset($_SESSION["nombres"]);
    unset($_SESSION["score"]);
    unset( $_SESSION["rand"]);
    header('Location: guess.php');
    exit();
}
?>
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
<body >
    
<div class="formulaire ">
<h1>Guess The Number</h1>
<div class="account-type">
    <p><i class="glyphicon glyphicon-user"></i> <span> <?=  $_SESSION['name']?></span></p>
    
    <p > The difficulty :  <span><?= $_SESSION['level'] ?></span> </p>
    <hr>
    <hr> 
    <form action="" method="post" style="text-align: center;">
    <input type="number" placeholder=''autofocus  value="<?php 
                                                             if(isset ($_SESSION['chiffre']))
                                                             {
                                                                echo $_SESSION['chiffre'];
                                                             } 
                                                             else echo "0000";
                                                             ?>"  name="chiffre"/>
    <div class="btn-block">
        <input type="Submit" value="Guess" name="Guess"/>
    </div>  
    </form>
    
    <p><span><?php if(isset($_POST["chiffre"])){ echo $_POST["chiffre"] . " : " . $_SESSION["R"];} ?></span></p>
    <hr>
    <p >You Still Have : <span><?= $_SESSION['reste']?></span></p>
    <hr>
    <p >Wrong numbers :<span> <?php foreach($_SESSION["nombres"] as $values) { echo $values . " . "; } ?></span></p>
    <hr>
    <p >Score : <span><?php echo $_SESSION["score"]  ?></span></p>
    
    
</div>
</body>
</html>