<?php require("user.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Fitness</title>
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

    <div class="form">
        <FORM action"" method="POST">
            <select name="user" id="user-select">
                <option value="1" selected>User 1</option>
                <option value="2">User 2</option>
                <option value="3">User 3</option>
                <option value="4">User 4</option>
                <option value="5">User 5</option>
                <option value="6">User 6</option>
            </select>
        </FORM>
    </div>
    <?php
    //récupération de la liste des users en BDD.
    try {
        $base = new PDO('mysql:host=localhost; dbname=base_sportive', 'root', '');
        $DonneeBruteUser = $base->query("SELECT * from user");
        $TabUserIndex = 0;
        while ($tab = $DonneeBruteUser->fetch()) {
            //ici on creer nos objets User pour chaque tuple de notre requête
            //et on les places dans un tableau de User
            $TabUser[$TabUserIndex++] = new User($tab['id_user'], $tab['pseudo'],$tab['motdepasse']);
        }
    } catch (exception $e) {
        $e->getMessage();
    }
    ?>

    <form action="" method="POST">
        <select name="user" id="id-select">
            <?php
            //parcours du tableau de User pour afficher les options de la liste déroulante
            foreach ($TabUser as $objetUser) {
                echo '<option value="' . $objetUser->getIdUser() . '">' . $objetUser->getPseudo() .$objetUser->getMdp() . '</option>';
            }
            ?>
        </select>
        <input type="submit"></input>
        </form>

    <?php
    //traitement du formulaire
    if (isset($_POST["user"])) 
    {

        //recherche de l'id dans le tableau de user
        foreach ($TabUser as $objetUser) {
            if ($objetUser->getIdUser() == $_POST["user"]) {
                $objetUser->getPseudo();
            }
        }
    } else {
        echo "Aucun user selectionné";
    }




    ?>

</body>

</html>