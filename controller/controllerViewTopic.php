<?php 
    require_once '../service/ServiceTopic.php';
    require_once '../service/ServiceViewTopic.php';
    require_once '../service/ServiceCommentTopic.php';
    require_once '../presentation/forum_viewTopic.php';

    $Topic = ServiceTopic::serviceResearchTopicBy($_GET['idPost']);
    $author = ServiceViewTopic::searchUserById($Topic->getIdAuthor());
    $comments = serviceCommentTopic::ServiceSearchAllCommentByIdTopic($_GET['idPost']);
    if ($comments) {
        renderViewPost($Topic, $author, $comments);
    } else {
        renderViewPost($Topic, $author);
    }

    function getUsernameById(Int $id) {
        $rs = ServiceViewTopic::searchUserById($id);
        return $rs->getPseudo();
    }
?> 