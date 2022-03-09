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

function getUtilisateurActifByMailU($mailU){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM utilisateurs
                                JOIN roles ON role = IDROLES
                                WHERE mail = :mail
                                AND (permanent = 1 OR CURRENT_DATE BETWEEN dateActivation AND dateDesactivation)"
                            );
        $req->bindValue('mail', $mailU, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        print("Erreur! : " . $e->getMessage());
    }
    return $resultat;
}

function setUtilisateur($pseudo, $email, $role, $mdp, $dateActivation, $dateDesactivation, $permanent) {
    $resultat = false;
    $passconnect = hash('sha256', $mdp);
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO utilisateurs (pseudo, mail, motdepasse, role, dateActivation, dateDesactivation, permanent) 
                              VALUES (:pseudo, :mail, :mdp, :role, :dateActivation, :dateDesactivation, :permanent)');
        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':mail', $email, PDO::PARAM_STR);
        $req->bindParam(':mdp', $passconnect, PDO::PARAM_STR);
        $req->bindParam(':role', $role, PDO::PARAM_INT);
        if ($dateActivation == ""){
            $dateActivation = null;
        }
        if ($dateDesactivation == ""){
            $dateDesactivation = null;
        }
        $req->bindParam(':dateActivation', $dateActivation, PDO::PARAM_STR);
        $req->bindParam(':dateDesactivation', $dateDesactivation, PDO::PARAM_STR);
        $req->bindParam(':permanent', $permanent, PDO::PARAM_INT);

        $resultat = $req->execute();

        $idUtilisateur = $cnx->lastInsertId();
        $pagesAutorisees = getPagesByRole($role);

        foreach($pagesAutorisees as $page){
            $resultat = setHabilitation($idUtilisateur, $page['idPage'], $dateActivation, $dateDesactivation, $permanent);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updateUtilisateur($pseudo, $email, $id, $dateActivation, $dateDesactivation, $permanent, $habilitations) {
    $resultat = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE utilisateurs 
                              SET pseudo = :pseudo, mail = :mail, dateActivation = :dateActivation, dateDesactivation = :dateDesactivation, permanent = :permanent
                              WHERE IDUTILISATEURS = :id');
        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':mail', $email, PDO::PARAM_STR); 
        $req->bindParam(':role', $role, PDO::PARAM_INT);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        if ($dateActivation == ""){
            $dateActivation = null;
        }
        if ($dateDesactivation == ""){
            $dateDesactivation = null;
        }
        $req->bindParam(':dateActivation', $dateActivation, PDO::PARAM_STR);
        $req->bindParam(':dateDesactivation', $dateDesactivation, PDO::PARAM_STR);
        $req->bindParam(':permanent', $permanent, PDO::PARAM_INT);
        $resultat = $req->execute(); 

        foreach ($habilitations as $key=>$uneHabilitation){
            $dateDebut = $uneHabilitation['dateDebut'];
            if ($uneHabilitation['dateDebut'] == ""){
                $dateDebut = null;
            }
            $dateFin = $uneHabilitation['dateFin'];
            if ($uneHabilitation['dateFin'] == ""){
                $dateFin = null;
            }
            $resultat = updateHabilitation($id, $key, $dateDebut, $dateFin, $uneHabilitation['habilitationPermanente']);
        }

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