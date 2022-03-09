<?php

// partie menu public 
foreach($menuPublic as $item){ ?>
	<a class="menu" href="?action=<?= $item['action'] ?>" title="<?=$item['description'] ?>">
		<i class="material-icons"><?= $item['iconeMenu'] ?></i>
		<span class="icon-text"><?= $item['texteMenu'] ?></span>
	</a><br>
<?php
}
// partie menu connecté
if(isLoggedOn()){?>
 <?php
	if(isset($menuSpecifique)){ 
		foreach($menuSpecifique as $item){ ?>
			<a class="menu" href="?action=<?= $item['action'] ?>" title="<?=$item['description'] ?>">
			<i class="material-icons"><?= $item['iconeMenu'] ?></i>
			<span class="icon-text"><?= $item['texteMenu'] ?></span></a><br>
<?php
 		}
 	}
?>
<a class="menu" href="?action=deconnexion">
	<i class="material-icons">logout</i>
	<span class="icon-text">Déconnexion</span>
</a><br>
<?php
} 
else { ?>
	<a class="menu" href="?action=connexion">
		<i class="material-icons">login</i>
		<span> class="icon-text">Connexion</span>
	</a><br>
<?php
}
?>