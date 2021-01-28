<?php
    require_once '../dao/UserDAO.php';
    require_once '../class/Topic.php';
    require_once '../exception/ServiceException.php';
    require_once '../exception/DAOException.php';
    require_once '../dao/TopicDAO.php';

    class ServiceTopic {
        public static function serviceAddTopic(String $titre, Datetime $DatePost, String $Content, Int $nbComm, Int $Author) :Void {
            $Topic = new Topic();
            $Topic->setTitreTopic($titre)->setDateTopic($DatePost)->setContentTopic($Content)->setNbComm($nbComm)->setIdAuthor($Author);

            try {
                $dao = new TopicDAO();
                $dao->add($Topic);
            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public static function serviceResearchTopicBy(Int $idTopic) :?Topic {
            try {
                
                $dao = new TopicDAO();
                $data = $dao->researchBy($idTopic);

            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }

            $Topic = new Topic();
            $date = new Datetime($data['date']);
            $Topic->setIdTopic($data['idTopic'])->setTitreTopic($data['titreTopic'])->setDateTopic($date)->setContentTopic($data['contenu'])->setNbComm($data['nbComm'])->setIdAuthor($data['idUsers']);

            return $Topic;
        }

        public static function serviceReseachAll() :?Array {
            $dao = new TopicDAO();
            $dataToObject = array (); 
            try {
                $data = $dao->research();
                foreach ($data as $value) {
                    $author = UserDAO::researchUserById($value['idUsers']);
                    $Topic = new Topic();
                    $datePost = new Datetime($value['date']);
                    $Topic->setIdTopic($value['idTopic'])->setTitreTopic($value['titreTopic'])->setDateTopic($datePost)->setContentTopic($value['contenu'])->setNbComm($value['nbComm'])->setIdAuthor($author->getPseudo());
                    array_push($dataToObject, $Topic);
                }
                
                return $dataToObject;

            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            } 
        }

        public  static function serviceSearchAllPerTen($premierTopic, $topicParPage){
            $dao = new TopicDAO();
            $dataToObject = array();
            try{
                $data = $dao->researchPerTen($premierTopic, $topicParPage);
                foreach ($data as $value) {
                    $author = UserDAO::researchUserById($value['idUsers']);
                    $topic = new Topic();
                    $datePost = new Datetime($value['date']);
                    $topic->setIdTopic($value['idTopic'])->setTitreTopic($value['titreTopic'])->setDateTopic($datePost)->setContentTopic($value['contenu'])->setNbComm($value['nbComm'])->setIdAuthor($author->pseudo);
                    array_push($dataToObject, $topic);
                }
                return $dataToObject;

            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            } 
        }

        public static function serviceUpdateTopic(Int $idTopic, String $titre, Datetime $DatePost, String $Content, Int $nbComm, Int $idAuthor) :Void {
            $TopicToModify = new Topic();
            $TopicToModify->setTitreTopic($titre)->setDateTopic($DatePost)->setContentTopic($Content)->setNbComm($nbComm)->setIdAuthor($idAuthor);

            try {
                $dao = new TopicDAO();
                $dao->update($TopicToModify, $idTopic);
            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public static function serviceDeleteTopic(Int $idTopicToDelete) :Void {
            try {    
                $dao = new TopicDAO();
                $dao->delete($idTopicToDelete);
            } catch(DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public static function serviceSearchByNbComments() :?Array {
            try {
                $dao = new TopicDAO();
                $topicsFiltered = $dao->searchByNbComments();
            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            } finally {
                return $topicsFiltered;
            }
        }

        public static function serviceSearchByDate() :?Array {
            try {
                $dao = new TopicDAO();
                $topicsFiltered = $dao->searchByDate();
            } catch (DAOException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            } finally {
                return $topicsFiltered;
            }
        }
    }
?>