<?php 
    require_once('ConnectionMysqliDAO.php');
    require_once('../service/serviceCommentTopic.php');
    require_once('../Exception/PDOException.php');

    class CommentTopicDAO {
        public static function searchAllCommentByIdTopic(Int $idTopic) :?Array{
            $db = ConnectionMysqliDao::connect();

            try {
                $searchByRequest = $db->prepare("SELECT * FROM commentaire WHERE idTopic = :idTopic");
                $searchByRequest->execute(array(
                    ":idTopic" => $idTopic)
                );
                $data = $searchByRequest->fetchAll();
                return $data;
            } catch (PDOException $DAOException) {
                throw new DaoSqlException($DAOException->getMessage(), $DAOException->getCode());
            }
        }

        public static function addComment(Commentaire $comment) :Void {
            $db = ConnectionMysqliDao::connect();

            $commentDate      = $comment->datetimeToString($comment->getDate());
            $commentContent   = $comment->getContenuComm();
            $idAuthor         = $comment->getIdAuthor();
            $idPost           = $comment->getIdTopic();

            try {
                $addRequest = $db->prepare("INSERT INTO commentaire (idComm, date, contenuComm, idUsers, idTopic) VALUES (NULL, :dateComm, :contentComm, :idAuthor, :idPost)");
                $addRequest->execute(array(
                    ":dateComm"    => $commentDate,
                    ":contentComm" => $commentContent,
                    ":idAuthor"    => $idAuthor,
                    ":idPost"      => $idPost)
                );
            } catch (PDOException $DAOException) {
                throw new DaoSqlException($DAOException->getMessage(), $DAOException->getCode());
            }
        }

        public static function delete(Int $idComm) {

        }
    }