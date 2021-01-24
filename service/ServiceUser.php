<?php 
include_once('../dao/UserDAO.php');
include_once("../exception/UserException.php");
include_once('../exception/ServiceException.php');


ini_set('display_errors',1); 
error_reporting(E_ALL);

Class ServiceUser {

    static function addUser(User $user) 
    {
        try { 
            $userConnect = new UserDAO;
            $userConnect->addUser($user);
        } 
        catch (UserException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    } 

    function researchUserByEmail(String $email) 
    {
        try { 
            $userConnect = new UserDAO;
            $data = $userConnect->researchUserByEmail($email);
            return $data;
        } 
        catch (UserException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    static function UserVerifEmailAndHash(User $user, $email)
    {  
        try { 
            $userConnect = new UserDAO;
            $data = $userConnect->researchUserByEmail($email);
            if ($data)
            {
                //header('location: controllerUserConnect.php?action=afficherInscription');
                return false;
            }
            else
            { 
                $mdp = password_hash($user->getMdp(), PASSWORD_DEFAULT);
                $user->setMdp($mdp);

                $userAdd = new UserDAO();
                $userAdd->addUser($user);
                return true;
            }
        } 
        catch (UserException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    static function userConnect($user)
    {
        try { 
            $userConnect = new UserDAO;
            $data = $userConnect->researchUserByEmail($user); 
        if ($data) 
        {     
            $password = $_POST['password'];
            
            if (password_verify($password,$data->getMdp()))
            {
                $_SESSION['id'] = $data->getId();
                $_SESSION['pseudo'] = $data->getPseudo();
                $_SESSION['prenom'] = $data->getPrenom();
                $_SESSION['nom'] = $data->getNom();
                $_SESSION['email'] = $data->getEmail();
                $_SESSION['profil'] = $data->getProfil();
                header('location: controller/controllerMain.php');
                return true;
            }
            else 
            {
                //header('location: controllerUserConnect.php?erreur=mdpKO');
            }
        }
        else
            return false;
        } 
        catch (UserException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }    
    }

    static function editUser(User $user) 
    {
        try { 
            $userEdit = new UserDAO;
            $data = $userEdit->editUser($user); 
            
        } 
        catch (UserException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    } 
    
}