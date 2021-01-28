//Afficher le formulaire d'ajout ou de modification, selon le bouton - Destination
// $('.buttonsDestination button').click(function(e) {
    
//     if (displayForm.css("display") === "none") {
//         displayForm.attr("style", "display:block");
//     } else if (displayForm.css("display", "block")) {
//         displayForm.css("display", "none");
//     }
// });

$(".buttonsDestination").click(function(){
    if($('#formAjoutDestination').css('display') == 'none')
    {
        $("#formAjoutDestination").fadeIn()
    }else{
        $("#formAjoutDestination").hide()
    }
})



//dynamiser l'affichage des destinations , au clic, on va sonder dans la base de données, 
//toutes les destinations qui correspondent à la région cliquée


// function transmissionRegion(region){
//     console.log(region);
// }

$(document).ready(function(){  
    $('#contenu_region').empty();
   $('.map a').click(function(e){
    let region = null;
    region = this.getAttribute('id');
    console.log(region);
        $.ajax({
            url: "ControllerAjaxDestination.php?region="+region,
            type: "POST",
            dataType: "html",
            minLength: 1,
            success : function(code_html, statut){
              
                $('#contenu_region').html("")
                $('#contenu_region').append(code_html)
                }
            }
        );
   })
})
