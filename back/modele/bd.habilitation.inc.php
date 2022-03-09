<?php

/**
 * Renvoie les pages actuellement autorisées pour un utilisateur : idUtilisateur, idPage, dateDebut, dateFin, permanent, id 	description, action, urlControleur, pagePrivee, iconeMenu, texteMenu, defaut 	
 *
 * @param string $idUser
 * @return array
 */
function getHabilitationsByUser(string $idUser) : array {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM habilitation h JOIN page p ON h.idPage = p.id WHERE idUtilisateur=:id AND (CURRENT_DATE BETWEEN dateDebut AND dateFin OR permanent = 1)");
        $req->bindValue(':id', $idUser, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

/**
 * Renvoie vrai si un utilisateur possède l'habilitation pour une page
 *
 * @param integer $idUser
 * @param integer $idPage
 * @return boolean
 */
function getHabiliteByUserAndPage(int $idUser, int $idPage) : bool {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM habilitation h WHERE idUtilisateur=:user AND idPage = :page AND (CURRENT_DATE BETWEEN dateDebut AND dateFin OR permanent = 1)");
        $req->bindValue(':user', $idUser, PDO::PARAM_INT);
        $req->bindValue(':page', $idPage, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->rowCount();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getHabilitationsByUserAndPage(int $idUser, int $idPage) : array {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM habilitation h WHERE idUtilisateur=:user AND idPage = :page");
        $req->bindValue(':user', $idUser, PDO::PARAM_INT);
        $req->bindValue(':page', $idPage, PDO::PARAM_INT);
        $req->execute();
        $habilitation = $req->fetch(PDO::FETCH_ASSOC);
        if ($habilitation) {
            $resultat = $habilitation;
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getEtatHabilitationsByUser(string $idUser) : array {
    $resultat = array();
    try {
        $lesPages = getPages(1);
        foreach($lesPages as &$unePage) {
            $unePage['habilite'] = 0;
            if (getHabiliteByUserAndPage($idUser, $unePage['id'])){
                $unePage['habilite'] = 1;
                
            }
            $unePage['habilitation']= getHabilitationsByUserAndPage($idUser, $unePage['id']);
        }
        return $lesPages;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function setHabilitation($idUser, $idPage, $dateDebut, $dateFin, $permanent) {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO habilitation (idUtilisateur, idPage, dateDebut, dateFin, permanent) VALUES (:user, :page, :dateD, :dateF, :permanent) ON DUPLICATE KEY UPDATE dateDebut= :dateD, dateFin= :dateF , permanent= :permanent ');
        $req->bindParam(':user', $idUser, PDO::PARAM_INT);
        $req->bindParam(':page', $idPage, PDO::PARAM_INT);
        $req->bindParam(':dateD', $dateDebut, PDO::PARAM_STR);
        $req->bindParam(':dateF', $dateFin, PDO::PARAM_STR);
        $req->bindParam(':permanent', $permanent, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updateHabilitation($idUser, $idPage, $dateDebut, $dateFin, $permanent) {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO habilitation (idUtilisateur, idPage, dateDebut, dateFin, permanent) VALUES (:user, :page, :dateD, :dateF, :permanent) ON DUPLICATE KEY UPDATE dateDebut= :dateD, dateFin= :dateF , permanent= :permanent');
        $req->bindParam(':user', $idUser, PDO::PARAM_INT);
        $req->bindParam(':page', $idPage, PDO::PARAM_INT);
        $req->bindParam(':dateD', $dateDebut, PDO::PARAM_STR);
        $req->bindParam(':dateF', $dateFin, PDO::PARAM_STR);
        $req->bindParam(':permanent', $permanent, PDO::PARAM_INT);
        $resultat = $req->execute(); 
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function supprHabilitation($idUser, $idPage) {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('DELETE FROM habilitation WHERE idUtilisateur = :user AND idPage = :page');
		$req->bindParam(':user', $idUser, PDO::PARAM_INT);
        $req->bindParam(':page', $idPage, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>