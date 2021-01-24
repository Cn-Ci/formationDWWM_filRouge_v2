<?php
    require_once('../dao/DestinationPDODAO.php');
    require_once('../exception/ServiceException.php');
    require_once('../interface/interfaceDestination.php');
    require_once('../interface/interfaceCommun.php');


    

    class ServiceDestination implements interfaceDestination, interfaceCommun {
        public function serviceAddDestination($id=null, string $region, string $lieu, string $image, string $petiteDescription, string $description,string $atout1, string $atout2, string $atout3,string $lien, string $extraitForum, string $idUser){
            $dest = new Destination();
            $dest->setRegion($region)->setLieu($lieu)->setImage($image)->setPetiteDescription($petiteDescription)->setDescription($description)->setAtout1($atout1)->setAtout2($atout2)->setAtout3($atout3)->setLien($lien)->setExtraitForum($extraitForum)->setIdUser($idUser);
            try {
                $destination = new DestinationPDODAO();
                $destination->add($dest);
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceResearchBy(Int $idDestination) :?Destination {
            try {
                $destination = new DestinationPDODAO();
                $data = $destination->researchBy($idDestination);
                return $data;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceReseachAll() {
            try {
                $destination = new DestinationPDODAO();
                $data = $destination->research();
                return $data;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceResearchByRegion(string $nomRegion) : ?array {
            try {
                $destination = new DestinationPDODAO();
                $data = $destination->researchByRegion($nomRegion);
                return $data;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }


        public  function serviceUpdateDestination(int $idDestination, string $region, string $lieu, ?string $image, string $petiteDescription, string $description,string $atout1, string $atout2, string $atout3,string $lien, string $extraitForum) {
            $destinationToModify = new Destination();
                      
            if($image!=null){
                $destinationToModify->setRegion($region)->setLieu($lieu)->setImage($image)->setPetiteDescription($petiteDescription)->setDescription($description)->setAtout1($atout1)->setAtout2($atout2)->setAtout3($atout3)->setLien($lien)->setExtraitForum($extraitForum);
            }elseif(empty($image) && $image==null|| !isset($image)){
                $destinationToModify->setRegion($region)->setLieu($lieu)->setPetiteDescription($petiteDescription)->setDescription($description)->setAtout1($atout1)->setAtout2($atout2)->setAtout3($atout3)->setLien($lien)->setExtraitForum($extraitForum);
            }
            try {
                $destination = new DestinationPDODAO();
                $rs=$destination->update($destinationToModify, $idDestination);
                return $rs;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceDelete(Int $idDestination) {
            
            try {    
                $destination = new DestinationPDODAO();
                $destination->delete($idDestination);
            } catch(DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }
    }
?>