<?php 
    require_once('../presentation/personnel.php');
    require_once('../service/ServicePersonnel.php');

        if(empty($_GET)){
            $personnels = ServicePersonnel :: searchAllPersonnels();
            afficherPersonnel($personnels);
            
        }elseif(isset($_GET)    && !empty($_GET)    &&
                isset($_GET['action'])  && $_GET['action']=='supprimer' &&
                isset($_GET['id'])){
                    $id= $_GET['id'];
                    if(ServicePersonnel::serviceDeletePersonnel($id)){
                        header('../controller/controllerMain.php');
                    }
                    else
                    {
                        echo "error";
                    }
                
                }
            
         