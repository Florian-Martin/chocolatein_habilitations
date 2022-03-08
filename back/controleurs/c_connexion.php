<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// recuperation des donnees GET, POST, et SESSION


if(isset($_POST['formconnexion'])){
    $pseudoconnect = $_POST['formmail'];
    $passconnect = hash('sha256', $_POST['formmdp']);
    login($pseudoconnect, $passconnect);
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
if(isLoggedOn()){
    header("Location: index.php");
} else {
    $title = "Connexion";
    include "$racine/vues/entete.html.php";
    include "$racine/vues/v_connexion.php";
    include "$racine/vues/pied.html.php";
}   
?>