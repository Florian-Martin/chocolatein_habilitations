<?php

function getUtilisateurs() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateurs JOIN roles ON role = IDROLES ");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getUtilisateurByMailU($mailU) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateurs JOIN roles ON role = IDROLES where mail=:mail");
        $req->bindValue(':mail', $mailU, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function setUtilisateur($pseudo, $email, $role, $mdp) {
    $resultat = false;
    $passconnect = hash('sha256', $mdp);
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO utilisateurs (pseudo, mail, motdepasse, role) VALUES (:pseudo, :mail, :mdp, :role)');
        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':mail', $email, PDO::PARAM_STR);
        $req->bindParam(':mdp', $passconnect, PDO::PARAM_STR);
        $req->bindParam(':role', $role, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updateUtilisateur($pseudo, $email, $role, $id) {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE utilisateurs SET pseudo = :pseudo, mail = :mail, role = :role WHERE IDUTILISATEURS = :id');
        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':mail', $email, PDO::PARAM_STR); 
        $req->bindParam(':role', $role, PDO::PARAM_INT);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute(); 
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function supprUtilisateur($id) {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('DELETE FROM utilisateurs WHERE IDUTILISATEURS = :id ');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>