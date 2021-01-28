<?php 
    require_once('../exception/DAOException.php');
    require_once('ConnectionMysqliDAO.php');
    require_once('../interface/interfaceDAO.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class TopicDAO implements interfaceDao {
        public function add(Object $Topic) :Void {
            $db = ConnectionMysqliDAO::connect();

            $topicTitle     = $Topic->getTitreTopic();
            $topicDate      = $Topic->datetimeToString($Topic->getDateTopic());
            $topicContent   = $Topic->getContentTopic();
            $topicNbComment = $Topic->getNbComm();
            $idUser         = $Topic->getIdAuthor();

            try {
                $addRequest = $db->prepare("INSERT INTO topic (idTopic, titreTopic, date, contenu, nbComm, idUsers) VALUES (NULL, :titre, :datePost, :contenue, :nbComm, :idAuthor)");
                $addRequest->execute(array(
                    ":titre"    => $topicTitle,
                    ":datePost" => $topicDate,
                    ":contenue" => $topicContent,
                    ":nbComm"   => $topicNbComment,
                    ":idAuthor" => $idUser)
                );
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }

        public function researchBy(Int $idTopic) :?Object {
            $db = ConnectionMysqliDAO::connect();

            try {
                $searchByRequest = $db->prepare("SELECT * FROM topic WHERE idTopic = :idTopic");
                $searchByRequest->execute(array(
                    ":idTopic" => $idTopic)
                );
                $data = $searchByRequest->fetch(MYSQLI_ASSOC);
                return $data;
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }

        public function research() :?Array {
            $db = ConnectionMysqliDAO::connect();

            try {
                $searchRequest = $db->query("SELECT * FROM topic LIMIT 20");
                $searchRequest->execute();
                $Topics = $searchRequest->fetchAll();
                return $Topics;
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }
        public function researchPerTen($premierTopic, $topicParPage) :?Array {
            $db = ConnectionMysqliDAO::connect();
            try{
                $sql    = 'SELECT * from `topic` order by `idTopic` DESC LIMIT :premierTopic , :topicParPage ;';
                $query  = $db->prepare($sql);
                $query->bindParam(':premierTopic', $premierTopic, PDO::PARAM_INT);
                $query->bindParam(':topicParPage', $topicParPage, PDO::PARAM_INT);
                $query->execute();
                $topics= $query->fetchAll(PDO::FETCH_ASSOC) ;
                return $topics;
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
            
        }

        public function update(Object $Topic, Int $idTopic) :Void {
            $db = ConnectionMysqliDAO::connect();
            $topicTitle     = $Topic->getTitreTopic();
            $topicDate      = $Topic->datetimeToString($Topic->getDateTopic());
            $topicContent   = $Topic->getContentTopic();
            $topicNbComment = $Topic->getNbComm();
            $idUser         = $Topic->getIdAuthor();

            try {
                $updateRequest = $db->prepare("UPDATE `topic` SET titreTopic = :titre, date = :datePost, contenu = :contenue, nbComm = :nbComm, idUsers = :author WHERE idTopic = :idTopic");
                $updateRequest->execute($t= array(
                    ":titre"    => $topicTitle,
                    ":datePost" => $topicDate,
                    ":contenue" => $topicContent,
                    ":nbComm"   => $topicNbComment,
                    ":author"   => $idUser,
                    ":idTopic"  => $idTopic)
                );
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }   

        public function delete(Int $idTopic) :Void {
            $db = ConnectionMysqliDAO::connect();

            try {
                $DeleteRequest = $db->prepare("DELETE FROM topic WHERE idTopic = :idTopic");
                $DeleteRequest->execute(array(
                    ":idTopic" => $idTopic)
                );
            } catch (PDOException  $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }     
        
        public function searchByNbComments() :?Array{
            $db = ConnectionMysqliDAO::connect();

            try {
                $searchByRequest = $db->prepare("SELECT * FROM `topic` AS t ORDER BY t.nbComm DESC");
                $searchByRequest->execute();
                $rs = $searchByRequest->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                return $rs;
            }
        }

        public function searchByDate() :?Array{
            $db = ConnectionMysqliDAO::connect();

            try {
                $searchByRequest = $db->prepare("SELECT * FROM `topic` AS t ORDER BY t.date DESC");
                $searchByRequest->execute();
                $rs = $searchByRequest->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                return $rs;
            }
        }
    }
?> 
