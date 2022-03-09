<?php

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        $racine = "..";
    }

    if(isLoggedOn()){

        if(isset($_POST['add'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $pseudo = htmlentities($_POST['pseudo']);
                $email = htmlentities($_POST['email']);
                $role = htmlentities($_POST['role']);
                $mdp = htmlentities($_POST['mdp']);
                $dateActivation = htmlentities($_POST['dateActivation']);
                $dateDesactivation = htmlentities($_POST['dateDesactivation']);
                $permanent = htmlentities($_POST['estPermanent']);
                $resultat = setUtilisateur($pseudo, $email, $role, $mdp, $dateActivation, $dateDesactivation, $permanent);
                if($resultat){
                    $_SESSION["success"] = 'Utilisateur ajouté';
                }
                else{
                    $_SESSION["error"] = 'Problème lors de l\'ajout de l\'Utilisateur';
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
                $pseudo = htmlentities($_POST['pseudo']);
                $email = htmlentities($_POST['email']);
                $id = htmlentities($_POST['id']);
                //$habilitations = htmlentities($_POST['habilitations']);
                $habilitations = $_POST['habilitations'];
                $dateActivation = htmlentities($_POST['dateActivation']);
                $dateDesactivation = htmlentities($_POST['dateDesactivation']);
                $permanent = htmlentities($_POST['estPermanent']);

                $resultat = updateUtilisateur($pseudo, $email, $id, $dateActivation, $dateDesactivation, $permanent, $habilitations);
                if($resultat){
                    $_SESSION['success'] = 'Utilisateur modifié';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la modification de l\'Utilisateur';
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
                $resultat = supprUtilisateur($id);
                if($resultat){
                    $_SESSION['success'] = 'Utilisateur supprimé';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la suppression de l\'Utilisateur';
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

        // recuperation des donnees GET, POST, et SESSION

        // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


        // traitement si necessaire des donnees recuperees
        $utilisateur = getUtilisateurs();
        $roles = getRoles();
        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Modifier les Utilisateurs";
        include "$racine/vues/entete.html.php";
        include "$racine/vues/v_crudUtilisateurs.php";
        include "$racine/vues/pied.html.php";

    }else{ header("Location: index.php"); }
?>