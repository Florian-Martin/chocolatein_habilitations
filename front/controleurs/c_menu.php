<?php

/**
 * Gestion de l'affichage des gammes
 *
 * PHP Version 7
 *
 * @category  B13
 * @package   ChocolateIn
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2020 José GIL
 * @license   José GIL
 * @version   GIT: <0>
 * @link      https://chocolatein.gil83.fr Contexte « Chocolate'In »
 */

$lesGammes = $pdo->getLesGammes();
include './vues/v_menu.php';


?>