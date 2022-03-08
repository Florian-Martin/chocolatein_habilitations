<?php
// partie pour tout le monde ?>
	<a class="menu" href="?action=catalogue"><i class="material-icons">import_contacts</i><span class="icon-text">Catalogue</span></a><br>

<?php
// partie connectée
	if(isLoggedOn()){?>

	<?php
		if(roleIsIn([1,2,3])){ ?>
			<a class="menu" href="?action=compte"><i class="material-icons">account_circle</i><span class="icon-text">Mes infos personnelles</span></a><br>

			<a class="menu" href="?action=CRUDGammes"><i class="material-icons">inventory_2</i><span class="icon-text">Gestion des gammes</span></a><br>

			<a class="menu" href="?action=CRUDProduits"><i class="material-icons">category</i><span class="icon-text">Gestion des produits</span></a><br>
			
			<a class="menu" href="?action=CRUDActualites"><i class="material-icons">feed</i><span class="icon-text">Gestion des actualités</span></a><br>
		<?php
		} 
		if(roleIsIn([1,2])){ ?>
			<a class="menu" href="?action=CRUDMessages"><i class="material-icons">chat</i><span class="icon-text">Gestion des messages</span></a><br>
		<?php
		} 
		if(roleIsIn([1])){ ?>
			<a class="menu" href="?action=CRUDUtilisateurs"><i class="material-icons">group</i><span class="icon-text">Gestion des utilisateurs</span></a><br>
		<?php } ?>

		<a class="menu" href="?action=deconnexion"><i class="material-icons">logout</i><span class="icon-text">Déconnexion</span></a><br>

	<?php
	} else { ?>
		<a class="menu" href="?action=connexion"><i class="material-icons">login</i><span class="icon-text">Connexion</span></a><br>
	<?php 
	}
	?>