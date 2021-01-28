<?php 
    require_once('ConnectionMysqliDAO.php');
    require_once('../service/ServiceCommentTopic.php');
    require_once('../exception/PDOException.php');
    require_once('../exception/DAOException.php');
    
    class CommentTopicDAO {
        public static function searchAllCommentByIdTopic(Int $idTopic) :?Array{
            $db = ConnectionMysqliDAO::connect();

            try {
                $searchByRequest = $db->prepare("SELECT * FROM commentaire WHERE idTopic = :idTopic");
                $searchByRequest->execute(array(
                    ":idTopic" => $idTopic)
                );
                $data = $searchByRequest->fetchAll();
                return $data;
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }

        public static function addComment(Commentaire $comment) :Void {
            $db = ConnectionMysqliDAO::connect();

            $commentDate      = $comment->datetimeToString($comment->getDate());
            $commentContent   = $comment->getContenuComm();
            $idAuthor         = $comment->getIdAuthor();
            $idPost           = $comment->getIdTopic();
            
            //* LAUNCH AUTO INCREMENT OF NBCOMM IN PARENTTOPIC
            Self::incrementParentPostNbComm($idPost);

            try {
                $addRequest = $db->prepare("INSERT INTO commentaire (idComm, date, contenuComm, idUsers, idTopic) VALUES (NULL, :dateComm, :contentComm, :idAuthor, :idPost)");
                $addRequest->execute(array(
                    ":dateComm"    => $commentDate,
                    ":contentComm" => $commentContent,
                    ":idAuthor"    => $idAuthor,
                    ":idPost"      => $idPost)
                );
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }

        public static function delete(Int $idComm, Int $idParentTopic) :Void {
            $db = ConnectionMysqliDAO::connect();
           

            //* LAUNCH AUTO DECREMENT OF NBCOMM IN PARENTTOPIC
            Self::decrementParentPostNbComm($idParentTopic);

            try {
                $deleteRequest = $db->prepare("DELETE FROM commentaire WHERE idComm = :idComm");
                $deleteRequest->execute(array(
                    ":idComm" => $idComm)
                );
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }

        public static function modify(Int $idComm) {}

        public static function incrementParentPostNbComm(Int $idTopic) :Void {
            $db = ConnectionMysqliDAO::connect();

            try {
                $incrementComm = $db->prepare("UPDATE `topic` SET nbComm = (@cur_value := nbComm) + 1 WHERE idTopic = :idTopic");
                $incrementComm->execute(array(
                    ":idTopic" => $idTopic)
                );
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }

        public static function decrementParentPostNbComm(int $idTopic) :Void {
            $db = ConnectionMysqliDAO::connect();

            try {
                $incrementComm = $db->prepare("UPDATE `topic` SET nbComm = (@cur_value := nbComm) - 1 WHERE idTopic = :idTopic");
                $incrementComm->execute(array(
                    ":idTopic" => $idTopic)
                );
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            }
        }
    }