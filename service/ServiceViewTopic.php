<?php 
require_once '../dao/UserDAO.php';

    class ServiceViewTopic {
        static public function searchUserById(Int $id) :Object {
            $author = UserDAO::researchUserById($id);
            return $author;
        }
    }