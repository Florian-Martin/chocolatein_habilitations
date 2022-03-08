<?php

/**
 * Gestion de l'affichage du formulaire de contact
 *
 * PHP Version 7
 *
 * @category  B35
 * @package   ChocolateIn B3
 * @author    Tiphaine Accary-Barbier <tiphaine.accary-barbier@ac-lyon.fr> 
 * @copyright 2020 José GIL
 * @license   José GIL
 * @version   GIT: <0>
 * @link      Contexte « Chocolate'In »
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$personne = filter_input(INPUT_POST, 'ident', FILTER_SANITIZE_STRING);
$statut = filter_input(INPUT_POST, 'statut', FILTER_SANITIZE_STRING);
$mail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
$site = filter_input(INPUT_POST, 'site', FILTER_SANITIZE_URL);
$message = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

if (!empty($action) && $action === "envoiContact" && $token == $_SESSION['token'] && time() - $_SESSION['token_time'] <= 120){
  $envoiReussi = $pdo->setLeContact($personne, $statut, $mail, $tel, $ville, $site, $message);
}


$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();
//var_dump($_SESSION['token']); 
include 'vues/v_contact.php';
