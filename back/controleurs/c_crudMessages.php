<?php
    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        $racine = "..";
    }


    // recuperation des donnees GET, POST, FILES et SESSION
    if(isLoggedOn()){
        if(isset($_POST['done'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $commentaire = $_POST['commentaire'];
                $resultat = traiterMessage($id, $commentaire);
                if($resultat){
                    $_SESSION['success'] = 'Demande de contact marquée comme traitée';
                }
                else{
                    $_SESSION['error'] = 'Problème lors du traitement de la demande de contact';
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

        if(isset($_POST['supr'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $resultat = supprMessage($id);
                if($resultat){
                    $_SESSION['success'] = 'Demande de contact suprimée';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la suppression de la demande de contact';
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
        $messages = getMessages();
        // traitement si necessaire des donnees recuperees

        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Gestion des demandes de contacts";
        include "$racine/vues/entete.html.php";
        include "$racine/vues/v_crudMessages.php";
        include "$racine/vues/pied.html.php";
    }else{
        header("Location: index.php");
    }

?>