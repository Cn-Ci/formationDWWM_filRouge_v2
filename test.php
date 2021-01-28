<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>MOBILI'T - Formulaire </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- HEAD -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="assets/userInscriptionStyle.css">
    </head>
    <body>
<div class="inscription">
        <form class="tableau text-center" action="../controller/controllerUser.php?action=inscription" method="post" enctype="multipart/form-data">
            <h3 class="titre my-5 ">Formulaire d'inscription</h3>
            <div class="mail">
                <input required id="focusId" class="text-center form-control-plaintext w-50 mx-auto" type="text" name="pseudo"  placeholder="Saisir votre pseudo"> <br/>
            </div>
            <div id="pseudo_verif" class="alert alert-danger text-center">
                <span class="pseudo">
                    <span class="pseudo_not_exist"><i class="fas fa-check-circle"></i></span>
                    <span class="pseudo_exist"><i class="fas fa-exclamtion-circle"></i>Ce pseudo existe déjà !</span>
                </span>
            </div>
            <div class="mail ">
                <input required id="email_inscription" class="text-center form-control-plaintext w-50 mx-auto" type="email" name="email"  placeholder="Saisir votre email"> <br/>
            </div>
            <div id="email_verif" class="alert text-center">
                <span class="email">
                    <span class="email_not_exist"><i class="fas fa-check-circle"></i></span>
                    <span class="email_exist"><i class="fas fa-exclamtion-circle"></i>Cet adresse e-mail existe déjà !</span>
                </span>
            </div>
            <div class="mail ">
                <input required class="text-center form-control-plaintext w-50 mx-auto" type="text" name="nom"  placeholder="Saisir votre nom"> <br/>
            </div>
            <div class="mail ">
                <input required class="text-center form-control-plaintext w-50 mx-auto" type="text" name="prenom"  placeholder="Saisir votre prenom"> <br/>
            </div>   
            <div class="mail align-items-center text-center">
                <input requided id ="password_inscription" class="text-center form-control-plaintext w-50 mx-auto"  type="password" name="password" placeholder="Saisir votre mot de passe"> <br/>       
            </div>
            <div class="mail align-items-center text-center">
                <input requided id ="confirm_password_inscription" class="text-center form-control-plaintext w-50 mx-auto"  type="password" name="password" placeholder="Confirmer votre mot de passe"> <br/>       
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="jumbo" class="p-1 m-1">Le mot de passe doit comporter au moins 
                        <div class="col-12">
                            <span class="caracteres">
                                <span class="caracteres_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="caracteres_pas_ok"><i class="fas fa-times-circle"></i></span><b>8 caractères</b>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="chiffre">
                                <span class="chiffre_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="chiffre_pas_ok"><i class="fas fa-times-circle"></i></span><b>1 chiffres</b>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="majuscule">
                                <span class="majuscule_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="majuscule_pas_ok"><i class="fas fa-times-circle"></i></span><b>1 majuscule</b>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="identique">
                                <span class="identique_ok"><i class="fas fa-check-circle"></i></span>
                                <span class="identique_pas_ok"><i class="fas fa-times-circle"></i></span><b>Les 2 mots de passe sont identiques</b>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <?php $photo = '../img/profilDefaut.jpg'; ?>
            <img id="photoUser" src="<?= $photo ?>" class="img-fluid" alt="photo">
            <div class="fichier ">
                <input requided class="text-center form-control-plaintext w-50 mx-auto" type="file" name="photo" onchange="previewFile()" placeholder="Selectionner votre photo ci dessous"> <br/>
                <hr>
            </div>    
                <button class="btnConnexion text-center btn btn-primary mt-3" type="submit" name="inscrire">S'inscrire</button>    
        </form>
        <div class="row text-center">
            <div class="col-12">
                <a href='../controller/controllerUser.php?action=connexion'>
                    <button class='btnConnexion btn btn-primary mb-4'> Se connecter</button>
                </a>
            </div>
            <div class="col-12">
                <a href='../controller/controllerMain.php'>
                    <button type="submit" class="retour text-center m-2 "><i class="fas fa-sign-in-alt"></i> Retour à la page d'accueil</button>           
                </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>

        // div pseudo caché
$('#pseudo_verif').hide();

// pseudo 
$("#focusId").on('click keyup', function(){
    var pseudo_user_inscription =  $("#focusId").val();
    if ($(this).val()) {
        $.ajax({
            url: "../assets/api/verifPseudo.php",
            type: "GET",
            data : "pseudo=" + pseudo_user_inscription,
            dataType: "html",
            minLength: 1,
            success : function(code_html, statut){
                if (code_html == '0'){
                    $("#focusId").css("border-bottom", "1px solid green");
                    $("#focusId").css("color", "green");
                    $('#pseudo_verif').hide();
                    $(".pseudo").css("color", "green");
                    $(".pseudo_exist").hide();
                    $(".pseudo_not_exist").show();
                    
                }else{
                    $("#focusId").css("border-bottom", "1px solid #a81b18");
                    $("#focusId").css("color", "#a81b18");
                    $('#pseudo_verif').show();
                    $(".pseudo").css("color", "#a81b18");
                    $(".pseudo_exist").show();
                    $(".pseudo_not_exist").hide();
                }
            }
        });
    } else {
        if( $("#focusId").val() != ''){
            $("#focusId").css("border-bottom", "1px solid #a81b18");
            $("#focusId").css("color", "#a81b18");
        }else{
            $("#focusId").css("border-bottom", "1px solid #ced4da");
            $("#focusId").css("color", "#495057");
        }
    }
});

// div email caché
$('#email_verif').hide();

// email
$("#email_inscription").on('click keyup', function(){
    var nom_user_inscription =  $("#email_inscription").val();
    var reg_inscription = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    if (reg_inscription.test($(this).val())) {
        $.ajax({
            url: "../assets/api/verifEmail.php",
            type: "GET",
            data : "email=" + nom_user_inscription,
            dataType: "html",
            minLength: 1,
            success : function(code_html, statut){
                if (code_html == '0'){
                    $("#email_inscription").css("border-bottom", "1px solid green");
                    $("#email_inscription").css("color", "green");
                    $('#email_verif').hide();
                    $(".email").css("color", "green");
                    $(".email_exist").hide();
                    $(".email_not_exist").show();
                    
                }else{
                    $("#email_inscription").css("border-bottom", "1px solid #a81b18");
                    $("#email_inscription").css("color", "#a81b18");
                    $('#email_verif').show();
                    $(".email").css("color", "#a81b18");
                    $(".email_exist").show();
                    $(".email_not_exist").hide();
                }
            }
        });
    } else {
        if( $("#email_inscription").val() != ''){
            $("#email_inscription").css("border-bottom", "1px solid #a81b18");
            $("#email_inscription").css("color", "#a81b18");
        }else{
            $("#email_inscription").css("border-bottom", "1px solid #ced4da");
            $("#email_inscription").css("color", "#495057");
        }
    }
});

// div jumbo caché
$('#jumbo').hide();

// div jumbo montré
$('#password_inscription').click(function(){
    $('#jumbo').show();
})

// mot de passe
$("#password_inscription").on('keyup', function(){
    var exp1 = /[0-9]{1,}/g; //contient au moins 1 chiffre 
    var exp2 = /[A-Z]{1,}/g; //contient au moins 1 majuscule

    if( $(this).val().length < 8){
        $(".caracteres").css("color", "#a81b18");
        $(".caracteres_ok").hide();
        $(".caracteres_pas_ok").show();
    }else{
        $(".caracteres").css("color", "green");
        $(".caracteres_ok").show();
        $(".caracteres_pas_ok").hide();
    }
    if(!exp1.test($(this).val())){
        $(".chiffre").css("color", "#a81b18");
        $(".chiffre_ok").hide();
        $(".chiffre_pas_ok").show();
    }else{
        $(".chiffre").css("color", "green");
        $(".chiffre_ok").show();
        $(".chiffre_pas_ok").hide();
    }
    if(!exp2.test($(this).val())){
        $(".majuscule").css("color", "#a81b18");
        $(".majuscule_ok").hide();
        $(".majuscule_pas_ok").show();
    }else{
        $(".majuscule").css("color", "green");
        $(".majuscule_ok").show();
        $(".majuscule_pas_ok").hide();
    }

    if( $(this).val() == ''){
        $(this).css("border-bottom", "1px solid #ced4da");
        $(this).css("color", "#495057");
        $(".caracteres").css("color", "#495057");
        $(".chiffre").css("color", "#495057");
        $(".majuscule").css("color", "#495057");
        $(".caracteres_ok").hide();
        $(".caracteres_pas_ok").hide();
        $(".majuscule_ok").hide();
        $(".majuscule_pas_ok").hide();
        $(".chiffre_ok").hide();
        $(".chiffre_pas_ok").hide();
    }else{
        var regPassword = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/);
        if (regPassword.test($(this).val())) {
            $(this).css("border-bottom", "1px solid green");
            $(this).css("color", "green");
        } else {
            $(this).css("border-bottom", "1px solid #a81b18");
            $(this).css("color", "#a81b18");
        }
    }

});

// confirmation mot de passe 
$("#confirm_password_inscription").on('keyup', function(){
    if($("#confirm_password_inscription").val() != $("#password_inscription").val()){
        $(".identique_ok").hide();
        $(".identique_pas_ok").show();
        $(".identique_pas_ok").css("color", "#a81b18");
        $(".identique").css("color", "#a81b18");
    } else {
        $(".identique_pas_ok").hide();
        $(".identique_ok").show();
        $(".identique_ok").css("color", "green");
        $(".identique").css("color", "green");
    }
});

// focus
window.onload = function(){
    document.getElementById('focusId').focus();
}



// changement photo instannée
function previewFile() {
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
    </script>