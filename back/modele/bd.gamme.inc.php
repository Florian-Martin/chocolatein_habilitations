<?php

function getGammes() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from gamme");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUneGamme($id) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from gamme where id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutGamme($id, $libelle, $picto){
    $resultat = false;
    try {
        $cheminImages = "./vues/images/produits/";
        $repertoireCible = $cheminImages.$id;
        if (!file_exists($repertoireCible))
        {
            mkdir($repertoireCible,0775);
        }


        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO gamme (id, libelle, picto) VALUES (:id, :libelle, :picto)');
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->bindParam(':libelle', $libelle, PDO::PARAM_STR);
        $req->bindParam(':picto', $picto, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function editGamme($id, $libelle, $picto){
    $resultat = false;
    try {

            // si le nom de la gamme change, modifier le nom du dossier des images



        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE gamme SET libelle = :libelle, picto = :picto  WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->bindParam(':libelle', $libelle, PDO::PARAM_STR);
        $req->bindParam(':picto', $picto, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function supprGamme($id){
    $resultat = false;
    try {

        // !! quand on supprime une gamme, s'assurer qu'il n'y a pas de produits dans cette gamme !
        // !! par exemple compter le nb de produits de cette gamme et voir comment renvoyer un message pour expliquer


        // détruire le dossier de la gamme 
        $cheminImages = "./vues/images/produits/";
        $repertoireCible = $cheminImages.$id;
        if (file_exists($repertoireCible))
        {
            rmdir($repertoireCible);
        }
        $cnx = connexionPDO();
        $req = $cnx->prepare('DELETE FROM gamme WHERE id = :id ');
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>