<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>MOBILI'T - Ajout de post</title>
        <meta charset="utf-8">
        <!-- HEAD -->
        <?php include_once '../templates/header.php'?>
        <!-- CSS -->
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="../assets/addTopic.css">

        <!-- API MESSAGE TOOLSBAR-->
        <script>
            tinymce.init({
                selector: 'textarea#inputContent',
                skin: 'bootstrap',
                plugins: 'lists, link, image, media',
                toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
                menubar: false
            });
        </script>
        <script 
            src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" 
            referrerpolicy="origin">
        </script>
    </head>

    <body>
        <?php include '../templates/navbar.php';?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2" id="buttonBack">
                    <a href="../controller/controllerTopic.php?action=showAllTopic">
                        <button type="submit" class="btn btn-success color-228B22 text-center pl-5 pr-5" id="boutonsubmit">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                            </svg> Retour
                        </button>
                    </a>
                </div>
                <div class="col"></div>
            </div>
   
            <?php 
            function RenderCreatePost() {
                ?>
                <div class="row">
                    <div class="col-12">
                        <div id="blockTopic">
                            <form method='POST' action='../controller/controllerTopic.php'>                                                
                                <input type="text" name="title" id="inputTitle" placeholder="Titre..." class="mb-5">
                                
                                <textarea name="content" cols="30" rows="15" placeholder="Mon avis..."></textarea>
                                
                                <input id="validate" name="AddTopic" class="btn btn-success color-228B22 text-center pl-5 pr-5 mt-5" type="submit" value="Valider">
                            </form>   
                        </div>
                    </div>
                </div>
                <?php  
            }

            function RenderModifyPost(Int $id, String $title, String $content) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <div id="blockTopic">
                            <form method='POST' action='../controller/controllerTopic.php?action=modify&idPost=<?php echo "$id"?>'>                                               
                                <input type="text" name="title" id="inputTitle" class="mb-5" value="<?php echo $title ?>">
                                
                                <textarea name="content" cols="30" rows="15"> <?php echo html_entity_decode($content) ?></textarea>
                                
                                <input id="validate" name="ModifyTopic" class="btn btn-success color-228B22 text-center pl-5 pr-5 mt-5" type="submit" value="Valider">
                            </form>   
                        </div>
                    </div>
                </div>
                <?php  
            }
            ?>                   

            <?php include_once '../templates/linkScriptJs.php';?>

    </body>
</html>