<?php
function afficherPersonnel(array $personnels){
    foreach($personnels as $personne){ 
    ?>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5 ml-5">
                    <img class="photoPersonnel img-fluid m-3" src="<?= $personne->getPhoto() ?>" alt="Personnel1"><br>
                    <h3>
                        <strong><?= $personne->getPrenom(). " " . $personne->getNom() ?><br>
                        <?= $personne->getEmploi() ?></strong>
                    </h3>
                </div>
                <div class="col-12 col-lg-6 mt-5">
                    <p class="couleur mt-3 text-justify text-right">
                        <?= $personne->getDescription() ?>
                    </p><br>  
                </div>
                <ul class="social-network social-circle mx-auto">
                    <li><a href ="<?= $personne->getFbLink()?>" class="icoFacebook" title="Facebook"><i class="fab fa-facebook" style="font-size:3rem; color:#3B5998"></i></a></li>
                    <li><a href ="<?= $personne->getTwLink()?>" class="icoTwitter" title="Twitter"><i class="fab fa-twitter" style="font-size:3rem; color:#0590B8"></i></a</li>
                    <li><a href ="<?= $personne->getLiLink()?>" class="icoLinkedin" title="Linkedin"><i class="fab fa-linkedin" style="font-size:3rem; color:#007bb7"></i></a></li>
                </ul>
            </div>
            <?php if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['profil'] == 'administrateur'){
                ?>
                <div class="text-right">
                    <a href='../controller/controllerPersonnelForm.php?action=modifier&id=<?= $personne->getId() ?>'>
                        <button type="submit" class="btn btn-outline-success ml-5 "><i class="fas fa-pen"></i>  </button>           
                    </a>
                    <a href='../controller/controllerPersonnel.php?action=supprimer&id=<?= $personne->getId() ?>'>
                        <button type="submit" class="btn btn-outline-danger "><i class="fas fa-trash-alt"></i> </button>           
                    </a>
                </div>
            <?php } ?>
            <hr>
        </div>
   <?php }
} ?>