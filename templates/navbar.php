<?php session_start() ?>

<nav  class="navbar navbar-expand-lg navbar-light text-vert position-fixed w-100">
	<a class="navbar-brand "><img class="img-fluid" id="logo" src="../img/logoMobiliT.png" alt="Logo"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse navbar-nav " id="navbarSupportedContent">
		<a class="nav-item active mx-auto nav-link text-shadow-pop-bottom p-1" href="../controller/controllerMain.php">ACCUEIL</a>
		<a class="nav-item mx-auto nav-link text-shadow-pop-bottom p-1" href="../presentation/orga.php">ORGANISATION</a>
		<a class="mx-auto nav-link text-shadow-pop-bottom p-1" href="../controller/controllerDestination.php">DESTINATION</a>
		<a class="mx-auto nav-link text-shadow-pop-bottom p-1" href="../controller/controllerTopic.php?action=showAllTopic">FORUM</a>
		
		
		<a class="nav-item dropdown mx-auto nav-link dropdown-toggle text-shadow-pop-bottom p-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php if (isset($_SESSION['id'])) { echo $_SESSION['email']; }else{ echo "LOGIN"; }?>	
		</a>
		<div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarDropdown">
			<?php if (isset($_SESSION['id'])) {?>
			<a class="dropdown-item p-1" href="../controller/controllerUser.php?action=modif">Modifier mon profil</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item p-1" href="../controller/controllerUser.php?action=deconnexion">Déconnection</a>
			<?php } else {?>
			<a class="dropdown-item p-1" href="../controller/controllerUser.php?action=afficherInscription">S'inscrire</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item p-1" href="../controller/controllerUser.php?action=connexion">Se connecter</a>
			<?php } ?>				
		</div>    
	</div>
</nav>

