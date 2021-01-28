<?php
session_start();

include_once("../presentation/user.php");
include_once("../presentation/userConnection.php");
include_once('../exception/ServiceException.php');  
include_once('../service/ServiceUser.php');  
include_once('../service/ServiceNewsletter.php ');  



/* IF ACTION -----------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------*/
if (isset($_GET['action']) && !empty($_GET['action']))
{    
    /* ****************************************** INSCRIPTION - Affichage formulaire inscription */
    if ($_GET['action']=="afficherInscription")   
    {
        try {
            /**_ INSCRIPTION - Affichage ________________**/
            inscription();
        } 
        catch (ServiceException $se) {
            /**_ INSCRIPTION - Affichage erreur  _______**/
            inscription(23002);
        } 
    }
    /* ****************************************** INSCRIPTION - Formulaire ?action=inscription */
    elseif ($_GET['action']=="inscription")   
    { 
        /* :::::::::::::: INSCRIPTION - Name bouton "inscrire" ::::::::::::::*/
        if (isset($_POST["inscrire"]) && isset($_POST["email"] ))
        {
            try {
            /**_ INSCRIPTION - Verification email _________**/
            $photo = $_FILES['photo']['tmp_name'];

            if($photo != null){
                $image=$_FILES['photo']['tmp_name'];           
                $imageaEnvoyer = file_get_contents($image);
                $user = new User;
                $user->setPseudo(htmlentities($_POST['pseudo']))
                    ->setEmail(htmlentities($_POST['email']))
                    ->setNom(htmlentities($_POST['nom']))
                    ->setPrenom(htmlentities($_POST['prenom']))
                    ->setPhoto($imageaEnvoyer)
                    ->setMdp(htmlentities($_POST['password']));
            } elseif(empty($_POST['photo'])) {
                $user = new User;
                $user->setPseudo(htmlentities($_POST['pseudo']))
                    ->setEmail(htmlentities($_POST['email']))
                    ->setNom(htmlentities($_POST['nom']))
                    ->setPrenom(htmlentities($_POST['prenom']))
                    ->setPhoto($image = null)
                    ->setMdp(htmlentities($_POST['password']));
            }
                
            if (ServiceUser::UserVerifEmailAndHash($user,($_POST['email'])))
                {
                    /**_ INSCRIPTION - if email not exist et hash ______**/
                    
                    connection(24002);
                    // "Vous etes inscrit"
                }
                else 
                {
                /**_ INSCRIPTION - If email exist ______**/
                  inscription(1062); 
                }  
            } 
            catch (ServiceException $se){
                /**_ INSCRIPTION - Affichage erreur  _______**/
                inscription($se->getMessage(), $se->getCode());
            } 
        } 
    }

    /* ****************************************** CONNEXION - Affichage formulaire inscription */
    if ($_GET['action'] == "connexion" )
    {
        try {
            /**_ CONNEXION - Affichage ___________________**/
            connection();
        } 
        catch (ServiceException $se) {
            /**_ CONNEXION - Affichage erreur ____________**/
            connection(23003);
        }  
    }
    elseif (($_GET['action'] == "connect"))
    {
    /* :::::::::::::: CONNEXION - Name bouton "connecter" ::::::::::::::*/
        if (isset($_POST['connecter']) && isset($_POST['email'] ))
        {
            try {
                /**_ CONNEXION - Verification email ______**/
                $user = new User;
                $user->setEmail(htmlentities($_POST['email']))
                    ->setMdp(htmlentities($_POST['password']));

                if (ServiceUser::userConnect($_POST['email']))
                {
                    /**_ CONNEXION - If email exist ______**/
                    header('location: controllerMain.php');
                    
                }
                else 
                {
                    /**_ CONNEXION - If email not-exist ___**/ 
                     connection(23004);
                }  
            }
            catch (ServiceException $se) {
                /**_ CONNEXION - erreur verification ______**/
                inscription($se->getMessage(), $se->getCode());
            }  
        }
    } 

 /* ****************************************** CONNEXION - Affichage formulaire modification */
    if($_GET["action"]=="modif" && isset($_SESSION['email']) ) 
    {    
            $searchEmail = new ServiceUser;
            $user = $searchEmail->researchUserByEmail($_SESSION['email']);
            modification($user);    
    }
    elseif($_GET["action"]=="modifierOK") 
    {    
        $photo = $_FILES['photo']['tmp_name'];

        if($photo != null){
            $image=$_FILES['photo']['tmp_name'];           
            $imageaEnvoyer = file_get_contents($image);  
            
            $user = new User;
            $user->setPseudo(htmlentities($_POST['pseudo']))
                ->setEmail(htmlentities($_POST['email']))
                ->setNom(htmlentities($_POST['nom']))
                ->setPrenom(htmlentities($_POST['prenom']))
                ->setPhoto($imageaEnvoyer);
    
            $userEdit = new ServiceUser;
            $data = $userEdit->editUser($user); 
        }else{
            
            $user = new User;
            $user->setPseudo(htmlentities($_POST['pseudo']))
                ->setEmail(htmlentities($_POST['email']))
                ->setNom(htmlentities($_POST['nom']))
                ->setPrenom(htmlentities($_POST['prenom']));
              // ->setPhoto($image = null);
    
            $userEdit = new ServiceUser;
            $data = $userEdit->editUser($user); echo "
                            <div class='alert alert-success m-5' role='alert'>
                                Le topic à été modifié avec succès.
                            </div>"
                        ;
        }
        
        header('location:../controller/controllerUser.php?action=modif');
        // "Votre modification a bien été enregistrée !"
    }

    /* ****************************************** DECONNEXION - Affichage formulaire deconnexion */
    if ($_GET['action'] == "deconnexion" )
        {
            try {
                session_destroy();
                include_once('controllerMain.php');
                // "Vous êtes deconnecté"
            } 
            catch (ServiceException $se) {
                session_destroy();
                include_once('controllerMain.php');
            } 
    } 

} 

?>