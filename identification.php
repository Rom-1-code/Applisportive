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

    //Gestion de l'inscription
    if(isset($_POST['username'])&& isset($_POST['password']) && isset($_POST['password2']))
	{
		if($_POST['password'] == $_POST['password2'])
		{
            try
			{
				$usernameformulaire = $_POST['username'];
				$testusernamebase = $Base->query('SELECT pseudo from user where pseudo="'.$usernameformulaire.'"');

				while($pseudobase=$testusernamebase->fetch())
				{
					echo $pseudobase["pseudo"];
				}
				
			}
			catch(Exception $erreur)
			{
				?> <p> erreur </p> <?php
			}
			
			if($usernameformulaire!=$pseudobase["pseudo"])
			{
				$flag = 1; //valeur qui nous indiquera si le pseudo est en base ou non, si flag existe et vaut 1 alors on peut envoyer le mdp et le username dans la base pour en faire un nouvel utilisateur
			}

			if($flag==1) //alors on peut tout rentrer en base
			{
				$_SESSION['imc'];
				$_SESSION['username']=$_POST['username'];
				$_SESSION['password']=$_POST['password'];
	
			}
			else
			{
				?><div class="erreur"><p>Le mot de passe doit être identique</p></div> <?php
        }
    }
    }
?>
<script src="javascript.js"></script>
</body>
</html>