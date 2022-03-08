<?php
    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        $racine = "..";
    }

    require_once("$racine/bibliotheques/htmlpurifier/HTMLPurifier.auto.php");
    $purifier = new HTMLPurifier();
    
    // recuperation des donnees GET, POST, FILES et SESSION
    if(isLoggedOn()){
        if(isset($_POST['add'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $titre = htmlentities($_POST['titre']);
                $contenu = $purifier->purify($_POST['contenu']);
                $datepublication = htmlentities($_POST['datePublication']);	
                $actif = htmlentities($_POST['actif']);	

                $resultat = ajoutActualite($titre, $contenu, $datepublication, $actif);
                if($resultat){
                    $_SESSION["success"] = 'Actualité ajoutée';
                }
                else{
                    $_SESSION["error"] = 'Problème lors de l\'ajout de l\'actualité';
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

        if(isset($_POST['edit'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $titre = htmlentities($_POST['titre']);
                $contenu = $_POST['contenu'];	
                $datepublication = htmlentities($_POST['datePublication']);	
                $actif = htmlentities($_POST['actif']);	
                $resultat = editActualite($id, $titre, $contenu, $datepublication, $actif);
                if($resultat){
                    $_SESSION['success'] = 'Actualité modifiée';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la modification de l\'actualité';
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
                $resultat = supprActualite($id);
                if($resultat){
                    $_SESSION['success'] = 'Actualité suprimée';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la suppression de l\'actualité';
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
        $actualites = getActualites();
        // traitement si necessaire des donnees recuperees

        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Gestion des actualités";
        include "$racine/vues/entete.html.php";
        include "$racine/vues/v_crudActualites.php";
        include "$racine/vues/pied.html.php";
    }else{
        header("Location: index.php");
    }

?>