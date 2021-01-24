<?php 
    require_once('../presentation/personnel_form.php');
    include_once('../exception/ServiceException.php');
    include_once('../service/ServicePersonnel.php');
    
    session_start();
   
    if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['profil']=="administrateur"){
        if (isset($_GET) && isset($_GET['action'])  && !empty ($_GET['action'])) {
            if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['action']=="modifier") {
                try{
                    
                    $personnel = ServicePersonnel :: serviceResearchPersonnelBy($_GET['id']);
                    renderForm($personnel);
    
                } 
                catch (ServiceException $se){
                    echo 'Error';
                }  
            }elseif($_GET['action']=="ajouter"){
    
                renderForm($personnel=null);
            }elseif($_GET['action']=='ajoute'){
                $nom = htmlentities($_POST['nom']);
                $prenom = htmlentities($_POST['prenom']);
                $photo = htmlentities($_POST['photo']);
                $emploi = htmlentities($_POST['emploi']);
                $description = htmlentities($_POST['description']);
                $LinkFB = htmlentities($_POST['LinkFB']);
                $LinkTW = htmlentities($_POST['LinkTW']);
                $LinkLI = htmlentities($_POST['LinkLI']);
    
                $personnel= new Personnel();
                $personnel  ->setNom($nom)->setPrenom($prenom)
                            ->setPhoto($photo)->setEmploi($emploi)->setDescription($description)
                            ->setFbLink($LinkFB)->setTwLink($LinkTW)->setLiLink($LinkLI);
                
                ServicePersonnel:: addPersonnel($personnel);
                displayButtons();
            }elseif($_GET['action']=='modifie'){
                $id = $_GET['id'];
                $nom = htmlentities($_POST['nom']);
                $prenom = htmlentities($_POST['prenom']);
                $photo = htmlentities($_POST['photo']);
                $emploi = htmlentities($_POST['emploi']);
                $description = htmlentities($_POST['description']);
                $LinkFB = htmlentities($_POST['LinkFB']);
                $LinkTW = htmlentities($_POST['LinkTW']);
                $LinkLI = htmlentities($_POST['LinkLI']);
    
                $personnel= new Personnel();
                $personnel  ->setId($id)->setNom($nom)->setPrenom($prenom)
                            ->setPhoto($photo)->setEmploi($emploi)->setDescription($description)
                            ->setFbLink($LinkFB)->setTwLink($LinkTW)->setLiLink($LinkLI);
                
                ServicePersonnel::updatePersonnel($personnel);
                header("Location: ../controller/controllerMain.php");
                
            }
        }
    }
    
    

    
    
    
?> 