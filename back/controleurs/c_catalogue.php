<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}


// recuperation des donnees GET, POST, et SESSION
if (isset($_POST['id']) && ($_POST['id'] != "")){
    $idGammeSelected = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
}
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$lesGammes = getGammes();

// traitement si necessaire des donnees recuperees
if (isset($idGammeSelected)){
    foreach ($lesGammes as $uneGamme){
        if ($uneGamme['id'] == $idGammeSelected){
            $idGamme = $uneGamme['id'];
            $nomGamme = $uneGamme['libelle'];
        }
    }
}
if (isset($idGamme)){
    $lesProduits = getProduitsByGame($idGamme);
    $title = "Produits de la gamme ".$nomGamme ;
}
else{
    $lesProduits = getProduits();
    $title = "Produits de toutes les gammes";
}


// appel du script de vue qui permet de gerer l'affichage des donnees

include "$racine/vues/entete.html.php";
include "$racine/vues/v_selecteurGammes.php";
include "$racine/vues/v_listeProduits.php";
include "$racine/vues/pied.html.php";
?>