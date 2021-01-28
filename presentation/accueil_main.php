<?php 
    function getMainPage() :Void {
        ?> 
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <title>MOBILI'T - Accueil</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta charset="utf-8">
                <!-- HEAD -->
                <?php include_once '../templates/header.php'?>
            </head>

            <body>
                <!----------------------------------------------------------------------NAVBAR--------------------------------------------------------->
                <?php include_once '../templates/navbar.php';?>

                <!----------------------------------------------------------------------PAGE 1--------------------------------------------------------->
                
                <div id="bg">
                    <div id="page1"></div>
                    <div id="contenu-page-1" class="ml-5 bounce-in-top">
                        <h1 class="line anim-typewriter">Mobili'T</h1>
                        <h2>Idées & Conseils voyage pour personnes en situation de handicap</h2>
                        <p>
                            <a href="../controller/controllerDestination.php" class="btn btn-lg bg-vert mt-1 ">VOIR LES DESTINATIONS</a>
                        </p>
                        
                    </div>
                    <!-- A revoir -->
                    <div id="bottom" class="w-100 mx-auto">
                        <a href="#page2" onclick="goToPage2()">
                            <div id="blocOverlay" class="col-12" >
                                <div class="footer"><p id="discoverSite">DÉCOUVRIR NOTRE SITE</p>
                                    <div id="triangle"></div>
                                </div>
                            </div>
                        </a> 
                    </div>
                </div>
   
                <!----------------------------------------------------------------------PAGE 2------------------------------------------------------------------------>
                <div id="page2" class="container-fluid ombre py-5">
                    <div class="row text-center" id="EntetePresentation">
                        <div class="mx-auto">
                            <h1 class="text-vert">Voyagez avec Mobili'T</h1>
                            <h5>Mobili'T est une société qui a pour but d'aider les personnes en situation de handicap ! </h5>
                            <h5>Quelque soit votre handicap, nous somme là pour vous ! </h5>
                        </div>
                    </div>
                    <div class="row pb-5 text-center mx-5">
                        <div class=" col-12 col-xl-4 p-4 mt-5">
                            <img class="img_150w_150h effet" src="../img/valise.png" alt=""><br>
                            <h3 class="mt-5"><span class="text-vert">L'organisation</span></h3>
                            <p class="text-justify">Mobili'T permet de vous guider dans les démarches d'un voyage, de la prise de décision, de la destination en passant par les transports ou vos besoins, jusqu'a votre retour ! Nous somme là votre ecoute pour toutes vos questions ! </p>
                        </div>
                        <div class="col-12 col-xl-4 p-4 mt-5">
                            <img class="img_150w_150h effet " src="../img/plane.png" alt=""><br>
                            <h3 class="mt-5"><span class="text-vert">Les destinations</span></h3>
                            <p class="text-justify">Mobili'T met à disposition des destinations adaptés à votre situation de handicap, nos lieux sont soignement choisis afin que vous ayez tout le matériels dont vous avez besoin et vous pouvez ainsi participer à toutes les activités proposés par ces lieux de vacances. Nous somme là pour vous faire vivre une expérience inoubliable !</p>
                        </div>
                        <div class="col-12 col-xl-4 p-4 mt-5">
                            <img class="img_150w_150h effet " src="../img/forumImage.png" alt=""><br>
                            <h3 class="mt-5"><span class="text-vert">Avis et Commentaires</span></h3>
                            <p class="text-justify">Mobili'T vous permet de commenter votre destination, de laisser un avis positif ou négatif sur votre séjour, sur la qualité de nos choix de destination ou sur le lieux de vos vacances. Vous pouvez également échanger sur votre expérience afin de donner envie aux prochains vacanciers, ou de les conseillers et ainsi vous pouvez aiderà votre tour les personnes dans une situation de handicap similaire à la votre ou non et répondre à leurs questions ! Nous sommes là aussi pour vous aider ! </p>
                        </div>  
                    </div> 
                </div>


                <!----------------------------------------------------------------------PAGE 3------------------------------------------------------------------------>
                <!-- BUTTON ADD PERSONNEL (FOR ADMIN) -->
                <div id="page3" class="container-fluid ombre py-5">
                    <div class="text-center mb-5">
                        <h1 class="text-vert">Le personnel de Mobili'T</h1>
                        <h5>Mobili'T possède une equipe spécialisée pour vous aider dans vos démarches </h5>
                        <h5>Mais aussi pour vous donner des conseils !</h5>
                    </div>
                        <?php include('../controller/controllerPersonnel.php') ?>
                        <?php if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['profil']=='administrateur'){?>
                        <div class="text-center ">
                            <a href='../controller/controllerPersonnelForm.php?action=ajouter'>
                                <button type="submit" class="btn btn-warning w-50 text-center ml-5 "><i class="fas fa-user-plus"></i></button>           
                            </a>
                        </div>
                        <?php } ?>
                </div>

                <!----------------------------------------------------------------------PAGE 4------------------------------------------------------------------------>
                <div id="page4" class="container my-5">
                    <div class="text-center mb-5">
                        <h1 class="text-vert">Le forum de Mobili'T</h1>
                        <h5>Mobili'T possède une page consacrer à vos questions, réponses, temoignages ..  </h5>
                        <h5>Vous pouvez aussi raconter votre expérience !</h5>
                    </div>
                    <div class="row ">
                        <div class="col-12">
                            <div class="row mx-auto">

                                <?php $RecentPost = renderRecentPost(); ?> 

                                <div class="col-12 col-lg-6">
                                    <!--POST 0-->
                                    <div class="postRecent row text-center">
                                        <div class="col-12 col-lg-4 my-3">
                                            <img class="ImgPostForum img-fluid" src="../img/bretagne.jpg" alt="Apercu image post forum">
                                        </div>

                                        <div class="col-12 col-lg-5 font">
                                            <h5>
                                                <?php echo $RecentPost[0]->getTitreTopic(); ?>
                                            </h5>

                                            <p>
                                                <?php checkContentLenght($RecentPost[0]->getContentTopic()); ?>
                                            </p>

                                            <h6>
                                                <?php echo $RecentPost[0]->datetimeToString($RecentPost[0]->getDateTopic()); ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <!--POST 1-->
                                    <div class="postRecent row text-center">
                                        <div class="col-12 col-lg-4 my-3">
                                            <img class="ImgPostForum img-fluid m-" src="../img/vignoble.jpg" alt="Apercu image post forum">
                                        </div>

                                        <div class="col-12 col-lg-5 font">
                                            <h5>
                                                <?php echo $RecentPost[1]->getTitreTopic(); ?>
                                            </h5>

                                            <p>
                                                <?php checkContentLenght($RecentPost[1]->getContentTopic()); ?>
                                            </p>

                                            <h6>
                                                <?php echo $RecentPost[1]->datetimeToString($RecentPost[1]->getDateTopic()); ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <!--POST 2-->
                                    <div class="postRecent row text-center">
                                        <div class="col-12 col-lg-4 my-3">
                                            <img class="ImgPostForum img-fluid" src="../img/vallee.jpg" alt="Apercu image post forum">
                                        </div>

                                        <div class="col-12 col-lg-5 font">
                                            <h5>
                                                <?php echo $RecentPost[2]->getTitreTopic(); ?>
                                            </h5>

                                            <p>
                                                <?php checkContentLenght($RecentPost[2]->getContentTopic()); ?>
                                            </p>

                                            <h6>
                                                <?php echo $RecentPost[2]->datetimeToString($RecentPost[2]->getDateTopic()); ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 p-0 text-center">
                                    <img class="img-fluid" src="../img/paysbasque.jpg" alt="Aperçu Forum">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------------------------------------------------------FOOTER------------------------------------------------------------------------------->
                <footer>
                    <?php include_once '../templates/footer.php'; ?>
                </footer>
                
                <?php include_once '../templates/linkScriptJs.php';?>
                <script type="text/javascript" src="../assets/script.js"></script>
            </body>
        </html><?php 
    }
?>