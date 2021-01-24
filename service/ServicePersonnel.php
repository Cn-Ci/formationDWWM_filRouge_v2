<?php
require_once '../dao/UserDAO.php';
require_once '../class/Personnel.php';
require_once '../exception/ServiceException.php';
require_once '../dao/PersonnelDAO.php';

class ServicePersonnel {
    public static function addPersonnel(Personnel $personnel) :Void {
        
        try {
            $dao = new PersonnelDAO();
            $dao->add($personnel);
            
        } catch (DaoSqlException $ServiceException) {
            throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
        }
    }

    public static function serviceResearchPersonnelBy(Int $idPersonnel) :?Personnel {
        try {
            $personnel = ( new PersonnelDAO())->searchBy($idPersonnel);
            return $personnel;
        } catch (DaoSqlException $ServiceException) {
            throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
        }
    }

    public static function searchAllPersonnels() : Array {
        try{
            $datas = (new PersonnelDAO())->searchAllPersonnel();
            return $datas;

        }catch(DaoSqlException $ServiceException){
            throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
        }
    }

    public static function updatePersonnel(Personnel $personnel){
        try{
            (new PersonnelDAO())->updatePersonnelDAO($personnel);
        }catch(DaoSqlException $ServiceException){
            throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
        }   
    }

    public static function serviceDeletePersonnel(int $id) : void{
        try{
            (new PersonnelDAO())->deletePersonnelDAO($id);
        }catch(DaoSqlException $ServiceException){
            throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
        }   
    }
}