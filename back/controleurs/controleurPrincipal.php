<?php
function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["catalogue"] = "c_catalogue.php";
    $lesActions["CRUDGammes"] = "c_crudGammes.php";
    $lesActions["CRUDProduits"] = "c_crudProduits.php";
    $lesActions["CRUDMessages"] = "c_crudMessages.php";
    $lesActions["CRUDActualites"] = "c_crudActualites.php";
    $lesActions["compte"] = "c_compte.php";
    $lesActions["CRUDUtilisateurs"] = "c_crudUtilisateurs.php"; 
    $lesActions["modale"] = "c_modale.php";
    $lesActions["connexion"] = "c_connexion.php";
    $lesActions["deconnexion"] = "c_deconnexion.php";
    $lesActions["defaut"] = "c_connexion.php";

    if (isLoggedOn()){
        $lesActions["defaut"] = "c_catalogue.php";
    }
     
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}

function chargerModeles($racine){
    include_once("$racine/modele/bd.inc.php");
    include_once("$racine/modele/bd.actualite.inc.php");
    include_once("$racine/modele/bd.authentification.inc.php");
    include_once("$racine/modele/bd.gamme.inc.php");
    include_once("$racine/modele/bd.message.inc.php");
    include_once("$racine/modele/bd.produit.inc.php");
    include_once("$racine/modele/bd.role.inc.php");
    include_once("$racine/modele/bd.utilisateur.inc.php");
}

?>