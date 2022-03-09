<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// recuperation des donnees GET, POST, et SESSION

$nomVue = $_GET['nomVue'];
$id = $_GET['id'];
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();

// traitement si necessaire des donnees recuperees
switch ($nomVue) {
    case "ajoutProduit" :
        $gammes = getGammes();
        $fichierVue = "crudProduits/v_ajoutProduit.php";
        break;
    case "modifProduit" :
        $gammes = getGammes();
        $fichierVue = "crudProduits/v_modifProduit.php";
        $data = getUnProduit($id);
        break;
    case "suprProduit" :
        $fichierVue = "crudProduits/v_suprProduit.php";
        $data = getUnProduit($id);
        break;
    case "ajoutGamme" :
        $fichierVue = "crudGammes/v_ajoutGamme.php";
        break;
    case "modifGamme" :
        $fichierVue = "crudGammes/v_modifGamme.php";
        $data = getUneGamme($id);
        break;
    case "suprGamme" :
        $fichierVue = "crudGammes/v_suprGamme.php";
        $data = getUneGamme($id);
        break;
    case "ajoutUtilisateur" :
        $fichierVue = "crudUtilisateurs/v_ajoutUtilisateur.php";
        $roles = getRoles();
        break;
    case "modifUtilisateur" :
        $fichierVue = "crudUtilisateurs/v_modifUtilisateur.php";
        $roles = getRoles();
        $data = getUtilisateurByMailU($id);
        $lesHabilitations = getEtatHabilitationsByUser($data['IDUTILISATEURS']);
        break;
    case "suprUtilisateur" :
        $fichierVue = "crudUtilisateurs/v_suprUtilisateur.php";
        $data = getUtilisateurByMailU($id);
        break;
    case "ajoutActualite" :
        $fichierVue = "crudActualites/v_ajoutActualite.php";
        break;
    case "modifActualite" :
        $fichierVue = "crudActualites/v_modifActualite.php";
        $data = getUneActualite($id);
        break;
    case "suprActualite" :
        $fichierVue = "crudActualites/v_suprActualite.php";
        $data = getUneActualite($id);
        break;
    case "voirMessage" :
        $fichierVue = "crudMessages/v_voirMessage.php";
        $data = getUnMessage($id);
        break;
    case "repondreMessage" :
        $fichierVue = "crudMessages/v_repondreMessage.php";
        $data = getUnMessage($id);
        break;
    case "suprMessage" :
        $fichierVue = "crudMessages/v_suprMessage.php";
        $data = getUnMessage($id);
        break;
}


// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vues/".$fichierVue;

?>