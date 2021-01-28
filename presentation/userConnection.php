
<?php 
function connection($errorCode=null){
    if($errorCode && $errorCode == 23003){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page de Connection! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24002){
        echo "<center><div class='alert alert-success'> Vous êtes inscrit, vous pouvez maintenant vous connecter ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23004){
        echo "<center><div class='alert alert-danger'> Erreur lors de la connexion, vérifiez vos identifiant ! !</div></center>";
    } 
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>MOBILI'T - Connection</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- HEAD -->
        <?php include_once '../templates/header.php'?>
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="../assets/userConnexionStyle.css">
    </head>
    
    <body>
        <div class="connection">
            <form class="tableau text-center m-5" action="../controller/controllerUser.php?action=connect" method="post">
                <h3 class="titre m-3">Connexion</h3>
                <div class="mail mt-2 ">
                    <input required id="myTextFocusEmail" class="text-center form-control-plaintext rounded w-50 mx-auto" type="email" name="email"  placeholder="Saisir votre email"> <br/>
                    <div id="email_verif" class="alert alert-danger text-center">
                        <span class="email">
                            <span class="email_exist"><i class="fas fa-check-circle"></i></span>
                            <span class="email_not_exist"><i class="fas fa-exclamtion-circle"></i>Cet adresse e-mail n'existe pas !</span>
                        </span>
                    </div>
                    
                </div>
                <div class="mail mt-2">
                    <input requided class="text-center form-control-plaintext rounded w-50 mx-auto" type="password" name="password" placeholder="Saisir votre mdp"> <br/>
                </div>
                <button class="btnConnection text-center btn btn-primary " type="submit" name="connecter" >Connexion</button>    
            </form>
            <div class="text-center">
                <a href='../controller/controllerMain.php'>
                    <button type="submit" class="retour text-center btn btn-dark m-2 "><i class="fas fa-sign-in-alt"></i> Retour à la page d'accueil</button>
                </a>
            </div>
        </div>
    </body>
    <?php include_once '../templates/linkScriptJs.php';?>
    <script type="text/javascript" src="../assets/userConnexionScript.js"></script>
<?php
}