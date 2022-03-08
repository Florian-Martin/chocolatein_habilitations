<?php
   
function getActualites() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from actualite");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUneActualite($id) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from actualite where id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutActualite($titre, $contenu, $datepublication, $actif){
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO actualite (titre, contenu, datepublication, actif) VALUES (:titre, :contenu, :datepublication, :actif)');
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindParam(':datepublication', $datepublication, PDO::PARAM_STR);
        $req->bindParam(':actif', $actif, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function editActualite($id, $titre, $contenu, $datepublication, $actif){
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE actualite SET titre = :titre, contenu = :contenu, datepublication = :datepublication, actif = :actif  WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindParam(':datepublication', $datepublication, PDO::PARAM_STR);
        $req->bindParam(':actif', $actif, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function supprActualite($id){
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('DELETE FROM actualite WHERE id = :id ');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>