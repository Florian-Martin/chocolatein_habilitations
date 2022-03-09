<?php
function controleurPrincipal($action){
    $lesActions = array();
    // pages statiques 
    $lesActions["connexion"] = "c_connexion.php";
    $lesActions["deconnexion"] = "c_deconnexion.php";
    $lesActions["defaut"] = "c_connexion.php";
    $lesActions["modale"] = "c_modale.php";

    // construction pages métier publiques
    $lesPagesPubliques = getPages(0);

    foreach($lesPagesPubliques as $unePage){
        $lesActions[$unePage['action']] = $unePage['urlControleur'];
        if ($unePage['defaut']){
            $lesActions["defaut"] = $unePage['urlControleur'];
        }
    }

    if(isLoggedOn()){
        //construction pages métier privées autorisées pour l'utilisateur connecté
        $user = getUtilisateurActifByMailU($_SESSION['mail']);
        $lesHabilitations = getHabilitationsByUser($user['IDUTILISATEURS']);
        //On fabrique un tableau avec clé = action et valeur = page de controleur
        foreach ($lesHabilitations as $uneHabilitation){
            $lesActions[$uneHabilitation['action']] = $uneHabilitation['urlControleur'];
        } 
    }
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}

function chargerMenuSpecifique(){
    $menu = array();

    if (isLoggedOn()){
        $user = getUtilisateurByMailU($_SESSION['mail']);
        $menu = getHabilitationsByUser($user['IDUTILISATEURS']);
    }
    return $menu;
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
    include_once("$racine/modele/bd.habilitation.inc.php");
    include_once("$racine/modele/bd.page.inc.php");
}

?>