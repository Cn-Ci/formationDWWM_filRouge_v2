<?php 
    if (!isset($_SESSION) || $_SESSION['profil'] != 'administrateur') {
       header('../controller/controllerMain.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire ajout personnel</title>
        <?php include_once '../templates/header.php';?>
    </head>
    
    <body>
        <?php
            //* FORMULAIRE AJOUT PERSONNEL
            function renderForm(?Personnel $personnel) :Void {
                ?>
                <div class="container my-5">
                    <div class="personnelAjout w-50 mx-auto">
                        <h1 class="text-center"><?php if($personnel){ echo "Formulaire de modification ";}else{echo "Formulaire Ajout";} ?></h1>
                        <form action="../controller/controllerPersonnelForm.php?action=<?php if($personnel){ echo "modifie&id=". $personnel->getId() ;}else{echo "ajoute" ;}?>" method="post">
                            <!-- NOM -->
                            <div class="form-group">
                                <label>Nom *</label>
                                <input type="text" class="form-control" name="nom" value="<?php if($personnel){ echo  $personnel->getNom() ;}?>" required>
                            </div>
                            <!-- PRENOM -->
                            <div class="form-group">
                                <label>Prénom *</label>
                                <input type="text" class="form-control" name="prenom" value="<?php if($personnel){ echo  $personnel->getPrenom() ;}?>" required>
                            </div>
                            <!-- Photo -->
                            <div class="form-group">
                                <label>Photo *</label>
                                <input type="text" class="form-control" name="photo" value="<?php if($personnel){ echo  $personnel->getPhoto() ;}?>" required>
                            </div>
                            <!-- EMPLOI -->
                            <div class="form-group">
                                <label>Emploi *</label>
                                <input type="text" class="form-control" name="emploi" value="<?php if($personnel){ echo  $personnel->getEmploi() ;}?>" required>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="form-group">
                                <label>Description *</label>
                                <input type="textarea" class="form-control" name="description" value="<?php if($personnel){ echo $personnel->getDescription() ;}?>" required>
                            </div>
                            <!-- LINK FACEBOOK -->
                            <div class="form-group">
                                <label>Lien facebook</label>
                                <input type="text" class="form-control" name="LinkFB" value="<?php if($personnel){ echo  $personnel->getFbLink() ;}?>" >
                            </div>
                            <!-- LINK TWITTER -->
                            <div class="form-group">
                                <label>Lien Twitter</label>
                                <input type="text" class="form-control" name="LinkTW" value="<?php if($personnel){ echo  $personnel->getTwLink() ;}?>">
                            </div>
                            <!-- LINK LINKEDIN -->
                            <div class="form-group">
                                <label>Lien Linkedin</label>
                                <input type="text" class="form-control" name="LinkLI" value="<?php if($personnel){ echo  $personnel->getLiLink() ;}?>" >
                            </div>

                            <input name="<?php if($personnel){ echo "modifier" ;}else{echo "ajouter";}?>" type="submit" class="btn btn-primary"></input>
                        </form>
                    </div>
                </div>
                <?php 
            }
           
            function displayButtons(){ ?>
                <div class="displayButtons m-5 text-center">
                    <h3>L'ajout a bien été effectué, désirez vous :</h3> 
                    <div class="row mt-5">
                        <div class="col-6 ">
                            <a class="btn btn-outline-secondary" href="../controller/controllerPersonnelForm.php?action=ajouter" role="button">+ Ajouter un nouvel employé</a>
                        </div>
                        <div class="col-6 ">
                            <a class="btn btn-outline-success" href="../controller/controllerMain.php" role="button">Revenir sur la page principale</a>
                        </div>
                    </div>
                </div>
            <?php }

        ?> 
    </body>
</html>