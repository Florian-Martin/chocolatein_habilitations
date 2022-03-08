<?php
    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        $racine = "..";
    }

    // recuperation des donnees GET, POST, FILES et SESSION
    if(isLoggedOn()){
        if(isset($_POST['add'])){
            if ($_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 60){
                $id = htmlentities($_POST['id']);
                $nom = htmlentities($_POST['nom']);
                $description = htmlentities($_POST['description']);	
                $packaging = htmlentities($_POST['packaging']);	
                $idgamme = htmlentities($_POST['idgamme']);	
                $fichier = $_FILES['fileToUpload']['tmp_name'];
                $nomFichier = $_FILES['fileToUpload']['name'];
                $taille = $_FILES['fileToUpload']['size'];
                $erreur = $_FILES['fileToUpload']['error'];
                $resultat = ajoutProduit($id, $nom, $description, $packaging, $idgamme, $nomFichier, $fichier);
                if($resultat){
                    $_SESSION["success"] = 'Produit ajouté';
                }
                else{
                    $_SESSION["error"] = 'Problème lors de l\'ajout du produit';;
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
                $nom = htmlentities($_POST['nom']);
                $description = htmlentities($_POST['description']);	
                $packaging = htmlentities($_POST['packaging']);	
                $urlimg = htmlentities($_POST['urlimg']);	
                $idgamme = htmlentities($_POST['idgamme']);		
                $resultat = editProduit($id, $nom, $description, $packaging, $urlimg, $idgamme);
                if($resultat){
                    $_SESSION['success'] = 'Produit modifié';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la modification du produit';
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
                $img = htmlentities($_POST['urlimg']);
                $resultat = supprProduit($id, $img);
                if($resultat){
                    $_SESSION['success'] = 'Produit supprimé';
                }
                else{
                    $_SESSION['error'] = 'Problème lors de la suppression du produit';
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
        $produits = getProduits();
        $gammes = getGammes();
        // traitement si necessaire des donnees recuperees

        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Gestion des produits";
        include "$racine/vues/entete.html.php";
        include "$racine/vues/v_crudProduits.php";
        include "$racine/vues/pied.html.php";
    }else{
        header("Location: index.php");
    }

?>