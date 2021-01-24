<?php
    require_once '../class/Topic.php';
    require_once '../exception/ServiceException.php';
    require_once '../dao/MainDAO.php';

    class ServiceMain {
        public static function serviceGetTopicOrderByDate() :?Array {
            try {
                $data = MainDAO::getTopicOrderByDate();
                $dataToObject = array (); 
                foreach ($data as $value) {
                    $Topic = new Topic();
                    $date = new Datetime($value['date']);
                    $Topic->setIdTopic($value['idTopic'])->setTitreTopic($value['titreTopic'])->setDateTopic($date)->setContentTopic($value['contenu'])->setNbComm($value['nbComm'])->setIdAuthor(4);
                    array_push($dataToObject, $Topic);
                }
                
                return $dataToObject;

            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            } 
        }
    }
?>