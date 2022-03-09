<?php
$racine = dirname(__FILE__);
include "$racine/controleurs/controleurPrincipal.php";
chargerModeles($racine);

// récupération du parametre 'action'
if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{  
    $action = "defaut";
}

// appel controleur principal
$fichier = controleurPrincipal($action);
$menuPublic = getPages(0);
$menuSpecifique = chargerMenuSpecifique();

//chargement du controleur correspondant à l'action
include "$racine/controleurs/$fichier";
?>