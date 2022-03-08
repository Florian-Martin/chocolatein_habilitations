<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 



// traitement si necessaire des donnees recuperees
    if(isLoggedOn()){

        $user = getUtilisateurByMailU($_SESSION['mail']);

        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Mes informations personnelles";
        include "$racine/vues/entete.html.php";
        include "$racine/vues/v_compte.php";
        include "$racine/vues/pied.html.php";

    }else{
        header("Location: ?action=connexion");
    }

?>



