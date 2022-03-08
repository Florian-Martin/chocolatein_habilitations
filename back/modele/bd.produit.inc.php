<?php

function getProduits() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from produit");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProduitsByGame($idGamme) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from produit WHERE idGamme = :idGamme");
        $req->bindParam(':idGamme', $idGamme, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUnProduit($id) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from produit where id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutProduit($id, $nom, $description, $packaging, $idgamme, $nomFichier, $fichier){
    $resultat = false;
    try {
        $cheminImages = "./vues/images/produits/";
        $repertoireCible = $cheminImages.$idgamme;
        // enleve l'extension : trouver meilleure façon d'enlever l'extension (pb des fichiers contenant des points)
        $nomFichierSansExt = substr($nomFichier, 0, strpos($nomFichier, "."));
        ajouterImageJpeg($repertoireCible, $nomFichierSansExt, $fichier);
        $urlimg = $cheminImages.$idgamme."/".$nomFichierSansExt;

        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO produit (id, nom, description, packaging, urlimg, idgamme) VALUES (:id, :nom, :description, :packaging, :urlimg, :idgamme)');
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->bindParam(':nom', $nom, PDO::PARAM_STR);
        $req->bindParam(':description', $description, PDO::PARAM_STR);
        $req->bindParam(':packaging', $packaging, PDO::PARAM_STR);
        $req->bindParam(':urlimg', $urlimg, PDO::PARAM_STR);
        $req->bindParam(':idgamme', $idgamme, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function editProduit($id, $nom, $description, $packaging, $urlimg, $idgamme){
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE produit SET nom = :nom, description = :description, packaging = :packaging, urlimg = :urlimg, idgamme = :idgamme  WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->bindParam(':nom', $nom, PDO::PARAM_STR);
        $req->bindParam(':description', $description, PDO::PARAM_STR);
        $req->bindParam(':packaging', $packaging, PDO::PARAM_STR);
        $req->bindParam(':urlimg', $urlimg, PDO::PARAM_STR);
        $req->bindParam(':idgamme', $idgamme, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function supprProduit($id, $urlImg){
    $resultat = false;
    try {
        supprimerImageJpeg($urlImg);
        $cnx = connexionPDO();
        $req = $cnx->prepare('DELETE FROM produit WHERE id = :id ');
        $req->bindParam(':id', $id, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajouterImageJpeg($repertoireCible, $nomFichierSansExt, $fichier){
    if (!file_exists($repertoireCible))
    {
        mkdir ($repertoireCible,0775);
    }
    //voir pour renommer image + traitement des doublons et return de l'url ??
    move_uploaded_file($fichier, $repertoireCible."/".$nomFichierSansExt.".jpg");
    creerImagesJpeg($repertoireCible,$nomFichierSansExt,300);
    creerImagesJpeg($repertoireCible,$nomFichierSansExt,750);
}

function supprimerImageJpeg($urlImg){
    @unlink($urlImg.".jpg");
    @unlink($urlImg."_300w.jpg");
    @unlink($urlImg."_750w.jpg");
}

function creerImagesJpeg($repertoireCible, $nomFichierSansExt, $largeur){
    // Calcul des nouvelles dimensions
    list($width, $height) = getimagesize($repertoireCible."/".$nomFichierSansExt.".jpg");
    $diff = $width / $largeur;
    $hauteur = $height / $diff;
    // création et enregistrement nouvelle image
    $image = imagecreatefromjpeg($repertoireCible."/".$nomFichierSansExt.".jpg");
    $nouvelleImage = imagecreatetruecolor($largeur, $hauteur);
    imagecopyresampled($nouvelleImage, $image, 0, 0, 0, 0, $largeur, $hauteur, $width, $height);
    imagejpeg($nouvelleImage, $repertoireCible."/".$nomFichierSansExt."_".$largeur."w.jpg") ;
}

?>