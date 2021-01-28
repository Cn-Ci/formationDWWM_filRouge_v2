<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>MOBILI'T - Formulaire </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- HEAD -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="../assets/userInscriptionStyle.css">
    </head>
    <body>
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

    <div class="inscription">
        <form class="tableau text-center" action="../controller/controllerUser.php?action=inscription" method="post" enctype="multipart/form-data">
            <h3 class="titre my-5 ">Formulaire d'inscription</h3>
            <div class="mail">
                <input required id="focusId" class="text-center form-control-plaintext w-50 mx-auto" type="text" name="pseudo"  placeholder="Saisir votre pseudo"> <br/>
            </div>
            <div id="pseudo_verif" class="alert alert-danger text-center">
                <span class="pseudo">
                    <span class="pseudo_not_exist"><i class="fas fa-check-circle"></i></span>
                    <span class="pseudo_exist"><i class="fas fa-exclamtion-circle"></i>Ce pseudo existe déjà !</span>
                </span>
            </div>
            <div class="mail ">
                <input required id="email_inscription" class="text-center form-control-plaintext w-50 mx-auto" type="email" name="email"  placeholder="Saisir votre email"> <br/>
            </div>
            <div id="email_verif" class="alert text-center">
                <span class="email">
                    <span class="email_not_exist"><i class="fas fa-check-circle"></i></span>
                    <span class="email_exist"><i class="fas fa-exclamtion-circle"></i>Cet adresse e-mail existe déjà !</span>
                </span>
            </div>
            <div class="mail ">
                <input required class="text-center form-control-plaintext w-50 mx-auto" type="text" name="nom"  placeholder="Saisir votre nom"> <br/>
            </div>
            <div class="mail ">
                <input required class="text-center form-control-plaintext w-50 mx-auto" type="text" name="prenom"  placeholder="Saisir votre prenom"> <br/>
            </div>   
            <div class="mail align-items-center text-center">
                <input requided id ="password_inscription" class="text-center form-control-plaintext w-50 mx-auto"  type="password" name="password" placeholder="Saisir votre mot de passe"> <br/>       
            </div>
            <div class="mail align-items-center text-center">
                <input requided id ="confirm_password_inscription" class="text-center form-control-plaintext w-50 mx-auto"  type="password" name="password" placeholder="Confirmer votre mot de passe"> <br/>       
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
                <input requided class="text-center form-control-plaintext w-50 mx-auto" type="file" name="photo" onchange="previewFile()" placeholder="Selectionner votre photo ci dessous"> <br/>
                <hr>
            </div>    
                <button class="btnConnexion text-center btn btn-primary mt-3" type="submit" name="inscrire">S'inscrire</button>    
        </form>
        <div class="row text-center">
            <div class="col-12">
                <a href='../controller/controllerUser.php?action=connexion'>
                    <button class='btnConnexion btn btn-primary my-4'> Se connecter</button>
                </a>
            </div>
            <div class="col-12">
                <a href='../controller/controllerMain.php'>
                    <button type="submit" class="retour text-center m-2 "><i class="fas fa-sign-in-alt"></i> Retour à la page d'accueil</button>           
                </a>
            </div>
        </div>
    </div>
    <?php include_once '../templates/linkScriptJs.php' ?>;
    <script type="text/javascript" src="../assets/userInscriptionScript.js"></script>
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
        <form class="tableau text-center my-2 mx-auto" action="../controller/controllerUser.php?action=modifierOK" method="post" enctype="multipart/form-data"> 
            <h3 class="titre mt-5 mb-5"><i class="fas fa-pen"></i> Formulaire de modification</h3>
            <div class="mail ">
                <input id="focusIdModif" class=" text-center form-control-plaintext w-50 mx-auto" type="text" name="pseudo" value="<?php echo $user->getPseudo()?>" placeholder="Modifiez votre pseudo" ></br>
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
            <input type="submit" class="btnConnexion  text-center btn btn-primary my-4 mt-3" value="Modifier"/>
        </form>
        <div class="text-center mb-">
            <a href='../controller/controllerMain.php' class='text-white'>
                <button type="submit" class='retour text-center btn btn-dark m-2 '><i class="fas fa-sign-in-alt"></i> Retour à la page d'accueil</button>
            </a>    
        </div>
    </body>
        <?php include_once '../templates/linkScriptJs.php';?>
        <script>
            // focus
            window.onload = function(){
                document.getElementById('focusId').focus();
            }
        </script>
<?php 
}
?>   
    
</body>
</html>