<?php 
    require_once('../exception/DAOException.php');
    require_once('ConnectionMysqliDAO.php');
    require_once('../interface/interfaceDAO.php');

    class MainDAO {
        static public function getTopicOrderByDate() :?Array {
            $db = ConnectionMysqliDAO::connect();

            try {
                $searchRecentPostRequest = $db->prepare("SELECT * FROM `topic` ORDER BY date DESC LIMIT 3");
                $searchRecentPostRequest->execute();
                $rs = $searchRecentPostRequest->fetchAll();
                return $rs;
            } catch (PDOException $DAOException) {
                throw new DAOException($DAOException->getMessage(), $DAOException->getCode());
            }
        }
    }
?> 