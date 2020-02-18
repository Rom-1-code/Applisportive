<?php session_start(); ?>
<?php require("user.php"); ?>

<?php

try {
    $Base =  new PDO('mysql:host=localhost; dbname=base_sportive; charset=utf8', 'root', '');
}
catch (Exception $erreurs) {

    echo "erreur à la base impossible";
} 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/identification.css">
    <title>Identification</title>
</head>

<body>
    <!-- HEADER -->
    <div class="page">
        <header>
            <div class="container">
                <nav class="menu-bar">

                    <!--TITRE-->

                    <div class="logo">
                        <ul class="titre">
                            <li class="name">
                                <a>
                                    <h1>Fitness<span class="tld">.php</span></h1>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--MENU DROIT-->

                    <div class="menu">
                        <ul class="right">
                            <li><b><a href="#">Decouvrir</a></li></b>
                            <li><b><a href="conseil.php">Conseil</a></li></b>
                            <li><b><a href="apropos.php">A propos</a></li></b>
                            <li><b><a href="identification.php">S'identifier</a></li></b>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </nav>
        </header>
    </div>
    </div>
    <!-- FIN HEADER -->
    <!-- Formulaire d'inscription -->
    <div class="form1">
        <h2>Inscription</h2>
        <form action="identification.php" method="POST">
            <label>Identifiant :</label>
            <input type="text" name="username" required />
            <p></p>
            <label>Mot de passe :</label>
            <input type="password" name="password" required />
            <p></p>
            <label>Confirmez le mot de passe :</label>
            <input type="password" name="password2" required />
            <p></p>
            <input type="submit" />
        </form>
        <p></p>
    </div>

    <?php
            if(isset($_POST['username'])&& isset($_POST['password']) && isset($_POST['password2']))
            {
                if($_POST['password'] == $_POST['password2'])
                {
                    $user1 = new user($_POST['username'],$_POST['password']); //les mots de passe sont corrects, on crée l'objet user

                }
            }

           ?> <button onclick="CalculIMC()">IMC</button> <?php


    ?>

    <!-- Formulaire de connexion -->
    <div class="form2">
        <h2>Connexion</h2>
        <form action="identification.php" method="POST">
            <p></p>
            <label>Identifiant :</label>
            <input type="text" name="username" required />
            <p></p>
            <label>Mot de passe :</label>
            <input type="password" name="password" required />
            <p></p>
            <input type="submit" />
        </form>
    </div>

    <button onclick="CalculIMC()">IMC</button>

    <?php // Début du PHP

    
  

?>
<script src="javascript.js"></script>
</body>
</html>