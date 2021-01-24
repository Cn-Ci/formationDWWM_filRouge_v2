<?php
function inscription($errorCode=null){
    if($errorCode && $errorCode == 1062){
        echo "<center><div class='alert alert-danger'> Cet utilisateur existe déjà ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23001){
        echo "<center><div class='alert alert-danger'> Erreur lors d'inscription ! !</div></center>";
    } 
    elseif($errorCode && $errorCode == 23002){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page d'inscription ! !</div></center>";
    } 
    elseif($errorCode && $errorCode == 24001){
        echo "<center><div class='alert alert-success'> Féliciation ! Vous êtes inscrit !</div></center>";
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>MOBILI'T - inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- HEAD -->
        <?php include_once '../templates/header.php'?>
        <link 
        rel="stylesheet" 
        type="text/css" 
        href="../assets/userInscriptionStyle.css">
    </head>
    
    <div class="inscription">
        <form class="tableau text-center" action="../controller/controllerUser.php?action=inscription" method="post" enctype="multipart/form-data">
            <h3 class="titre my-5 ">Formulaire d'inscription</h3>
            <div class="mail">
                <input required id="myTextFocusPseudo" class="text-center form-control-plaintext" type="text" name="pseudo"  placeholder="Saisir votre pseudo"> <br/>
            </div>
            <div id="pseudo_verif" class="alert alert-danger text-center">
                <span class="pseudo">
                    <span class="pseudo_not_exist"><i class="fas fa-check-circle"></i></span>
                    <span class="pseudo_exist"><i class="fas fa-exclamtion-circle"></i>Ce pseudo existe déjà !</span>
                </span>
            </div>
            <div class="mail ">
                <input required id="email_inscription" class="text-center form-control-plaintext" type="email" name="email"  placeholder="Saisir votre email"> <br/>
            </div>
            <div id="email_verif" class="alert text-center">
                <span class="email">
                    <span class="email_not_exist"><i class="fas fa-check-circle"></i></span>
                    <span class="email_exist"><i class="fas fa-exclamtion-circle"></i>Cet adresse e-mail existe déjà !</span>
                </span>
            </div>
            <div class="mail ">
                <input required class="text-center form-control-plaintext" type="text" name="nom"  placeholder="Saisir votre nom"> <br/>
            </div>
            <div class="mail ">
                <input required class="text-center form-control-plaintext" type="text" name="prenom"  placeholder="Saisir votre prenom"> <br/>
            </div>   
            <div class="mail align-items-center text-center">
                <input requided id ="password_inscription" class="text-center form-control-plaintext"  type="password" name="password" placeholder="Saisir votre mot de passe"> <br/>       
            </div>
            <div class="mail align-items-center text-center">
                <input requided id ="confirm_password_inscription" class="text-center form-control-plaintext"  type="password" name="password" placeholder="Confirmer votre mot de passe"> <br/>       
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="jumbo" class="p-1 m-1">Le mot de passe doit comporter au moins 
                        <div class="col-12">
                            <span class="caracteres">
                                <span class="caracteres_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="caracteres_pas_ok"><i class="fas fa-times-circle"></i></span><b>8 caractères</b>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="chiffre">
                                <span class="chiffre_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="chiffre_pas_ok"><i class="fas fa-times-circle"></i></span><b>1 chiffres</b>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="majuscule">
                                <span class="majuscule_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="majuscule_pas_ok"><i class="fas fa-times-circle"></i></span><b>1 majuscule</b>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="identique">
                                <span class="identique_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="identique_pas_ok"><i class="fas fa-times-circle"></i></span><b>Les 2 mots de passe sont identiques</b>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <?php $photo = '../img/profilDefaut.jpg'; ?>
            <img id="photoUser" src="<?= $photo ?>" class="img-fluid" alt="photo">
            <div class="fichier ">
                <input requided class="text-center form-control-plaintext" type="file" name="photo" onchange="previewFile()" placeholder="Selectionner votre photo ci dessous"> <br/>
                <hr>
            </div>    
                <button class="btnConnexion text-center btn btn-primary mt-3" type="submit" name="inscrire">S'inscrire</button>    
        </form>
        <div class="row text-center">
            <div class="col-12">
                <a href='../controller/controllerUser.php?action=connexion'>
                    <button class='btnConnexion btn btn-primary mb-4'> Se connecter</button>
                </a>
            </div>
            <div class="col-12">
                <a href='../controller/controllerMain.php'>
                    <button type="submit" class="retour text-center m-2 "><i class="fas fa-sign-in-alt"></i> Retour à la page d'accueil</button>           
                </a>
            </div>
        </div>
    </div>
    <?php include_once '../templates/linkScriptJs.php';?>
    <script type="text/javascript" src="../assets/userInscriptionScript.js"></script>
<?php
}

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
    <?php include_once '../templates/linkScriptJs.php';?>
    <script type="text/javascript" src="../assets/userConnexionScript.js"></script>
<?php
}

function modification($user, $errorCode=null){
    if($errorCode && $errorCode == 24005){
        echo "<div class='alert alert-danger'> Erreur lors de l'affichage de la page du formulaire de modification !</div>";
    }
    elseif($errorCode && $errorCode == 23006){
        echo "<center><div class='alert alert-danger'> Erreur lors de la modification ! !</div></center>";
    } 
    elseif($errorCode && $errorCode == 24003){
        echo "<center><div class='alert alert-success'> Votre modification a bien été enregistré !</div></center>";
    } 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>MOBILI'T - Modification</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- HEAD -->
        <?php include_once '../templates/header.php'?>
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="../assets/userInscriptionStyle.css">
    </head>
        <form class="tableau text-center my-2 mx-auto" action="../controller/controllerUser.php?action=modifierOK" method="post" enctype="multipart/form-data"> 
            <h3 class="titre mt-5 mb-5"><i class="fas fa-pen"></i> Formulaire de modification</h3>
            <div class="mail ">
                <input id="myTextFocusPseudoModif" class=" text-center form-control-plaintext w-50 mx-auto" type="text" name="pseudo" value="<?php echo $user->getPseudo()?>" placeholder="Modifiez votre pseudo" ></br>
            </div>
            <div class="mail">
                <input readonly class="text-center form-control-plaintext w-50 mx-auto" type="email" name="email" value="<?php echo $user->getEmail()?>" placeholder=" Modifiez votre email" ><br/>
            </div>
            <div class="mail">
                <input class=" text-center form-control-plaintext w-50 mx-auto" type="text" name="nom" value="<?php echo $user->getNom()?>" placeholder="Modifiez votre nom" > <br/>
            </div>
            <div class="mail">    
                <input class=" text-center form-control-plaintext w-50 mx-auto" type="text" name="prenom" value="<?php echo $user->getPrenom()?>" placeholder="Modifiez votre prenom" > <br/>
            </div>

            <?php $photo = ($user->getPhoto() != '') ? 'data:image/jpeg;base64, '.base64_encode( $user->getPhoto()).'' : '../img/profilDefaut.jpg'; ?>
            <img id="photoModif" class="img-fluid" src="<?= $photo ?>" alt="photo" >
            <div class="fichier">
                <input class="text-center form-control-plaintext mx-auto" type="file" onchange="previewFile()" name="photo" value="" placeholder="Modifiez votre photo"><br/>
                <hr>
            </div>  
            <input type="submit" class="btnConnexion  text-center btn btn-primary mb-4 mt-3" value="Modifier"/>
        </form>
        <div class="text-center mb-">
            <a href='../controller/controllerMain.php' class='text-white'>
                <button type="submit" class='retour text-center btn btn-dark m-2 '><i class="fas fa-sign-in-alt"></i> Retour à la page d'accueil</button>
            </a>    
        </div>
        <?php include_once '../templates/linkScriptJs.php';?>
        <script type="text/javascript" src="../assets/userInscriptionScript.js"></script>
<?php 
}
?>   
    
</body>
</html>