<?php
    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        $racine = "..";
    }


    // recuperation des donnees GET, POST, et SESSION
    if(isLoggedOn()){
        if(isset($_POST['add'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $libelle = htmlentities($_POST['libelle']);
                $picto = htmlentities($_POST['picto']);	
                $resultat = ajoutGamme($id, $libelle, $picto);
                if($resultat){
                    $_SESSION["success"] = 'Gamme ajoutée';
                }
                else{
                    $_SESSION["error"] = 'Problème lors de l\'ajout de la gamme';
                }
            } 
            else {
                if($_POST['token'] != $_SESSION['token']){
                    $_SESSION["error"] = 'Problème jeton invalide';
                }
                if(time() - $_SESSION['token_time'] > 60){
                    $_SESSION["error"] = 'Problème jeton expiré';
                }
            }
        }

        if(isset($_POST['edit'])) {
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $libelle = htmlentities($_POST['libelle']);
                $picto = htmlentities($_POST['picto']);	
                $resultat = editGamme($id, $libelle, $picto);
                if($resultat){
                    $_SESSION['success'] = 'Gamme modifiée';
                }
                else{
                    $_SESSION["error"] = 'Problème lors de la modification de la gamme';
                }
            } 
            else {
                if($_POST['token'] != $_SESSION['token']){
                    $_SESSION["error"] = 'Problème jeton invalide';
                }
                if(time() - $_SESSION['token_time'] > 60){
                    $_SESSION["error"] = 'Problème jeton expiré';
                }
            }
        }

        if(isset($_POST['supr'])) {
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $resultat = supprGamme($id);
                if($resultat){
                    $_SESSION['success'] = 'Gamme supprimée';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la suppression de la gamme';
                }
            } 
            else {
                if($_POST['token'] != $_SESSION['token']){
                    $_SESSION["error"] = 'Problème jeton invalide';
                }
                if(time() - $_SESSION['token_time'] > 60){
                    $_SESSION["error"] = 'Problème jeton expiré';
                }
            }
        }

        // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
        $gammes = getGammes();
        // traitement si necessaire des donnees recuperees

        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Gestion des gammes de produit";
        include "$racine/vues/entete.html.php";
        include "$racine/vues/v_crudGammes.php";
        include "$racine/vues/pied.html.php";
    }else{
        header("Location: index.php");
    }

?>