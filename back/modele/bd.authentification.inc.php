<?php

function login($pseudoconnect, $passconnect) {
    $util = getUtilisateurActifByMailU($pseudoconnect);
    if(isset($util["motdepasse"])){
        $mdpBD =  $util["motdepasse"]; 
        if($mdpBD == $passconnect){
            if (!isset($_SESSION)) {
                session_start();
            }
            // le mot de passe est celui de l'utilisateur dans la base de donnees
            $_SESSION["mail"] = $pseudoconnect;
            $_SESSION["motdepasse"] = $mdpBD;
            $_SESSION["role"] = $util["role"];
        } 
    }
    
}

function logout() {
    if (isLoggedOn()){
        session_unset();
    }
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mail"];
    }
    else {
        $ret = "";
    }
    return $ret; 
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;
    if(isset($_SESSION["mail"])) {
        $util = getUtilisateurActifByMailU($_SESSION["mail"]);
        if ($util["mail"] == $_SESSION["mail"] && $util["motdepasse"] == $_SESSION["motdepasse"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

function roleIsIn($tableauRole){
    $ret = false;
    if(isset($_SESSION["role"]) && in_array($_SESSION["role"], $tableauRole)){
        $ret = true;
    }
    return $ret;
}

?>