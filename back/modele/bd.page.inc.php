<?php
/**
 * Si le parametre vaut null : renvoie la liste de toutes les pages.
 * Si le parametre vaut 1 : renvoie la liste des pages privées,
 * Si le parametre vaut 0 : renvoie la liste des pages non privées
 *
 * @param string|null $private
 * @return array
 */
function getPages(?string $private ) :array {
    $resultat = array();
    $cnx = connexionPDO();
    try {
        if ($private != null){
            $req = $cnx->prepare("SELECT * FROM page WHERE pagePrivee = :private");
            $req->bindValue(':private', $private, PDO::PARAM_INT);
        }
        else {
            $req = $cnx->prepare("SELECT * FROM page");
        }
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

/**
 * Renvoie les id des pages associées au role passé en paramètre
 *
 * @param integer|null $role
 * @return array
 */
function getPagesByRole(?int $role ) :array {
    $resultat = array();
    $cnx = connexionPDO();
    try {
        $req = $cnx->prepare("SELECT idPage FROM pages_par_role WHERE idRole = :role");
        $req->bindValue(':role', $role, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>
