<?php
/**
 * Vue Entête
 *
 * PHP Version 7
 *
 * @category  B13
 * @package   ChocolateIn
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2020 José GIL
 * @license   José GIL
 * @version   GIT: <0>
 * @link      https://chocolatein.gil83.fr Contexte « Chocolate'in »
 */
?>
<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarChoc" aria-controls="navBarChoc" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navBarChoc">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?uc=accueil"><i class="fas fa-home"></i> Accueil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="?uc=gamme" id="dropdownChoc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tags"></i> Gamme</a>
                <div class="dropdown-menu" aria-labelledby="dropdownChoc">
                    <?php
                        foreach ($lesGammes as $key => $uneGamme) {
                            $idGamme = $uneGamme['id'];
                            $libelleGamme = $uneGamme['libelle'];
                            $pictoGamme = $uneGamme['picto'];
                            ?>
                            <a class="dropdown-item" href="?uc=gamme&nom=<?= $idGamme ?>"><i class="fas fa-<?= $pictoGamme ?>"></i> <?= $libelleGamme ?></a>
                            <?php
                                if ($key != array_key_last($lesGammes)) {
                                    ?>
                                    <div class="dropdown-divider"></div>
                                    <?php
                                }
                        }
                    ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?uc=horaires"><i class="fas fa-clock"></i> Horaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?uc=actualites"><i class="fas fa-newspaper"></i> Actualites</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?uc=acces"><i class="fas fa-map-marked-alt"></i> Plan d'accès</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?uc=contact"><i class="fas fa-address-card"></i> Nous contacter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/Chocolate.In.Bordeaux" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a>
            </li>
        </ul>
        <form class="form-inline mr-2 rounded border" method="get">
            <input name="uc" type="hidden" value="recherche">
            <input name="recherche" type="text" placeholder="Recherche" aria-describedby="infolettre" class="form-control border-0 shadow-0">
            <button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
        </form>
    </div>
</nav>
<!-- Contenu qui occupe au minimum toute la place restant sur un écran -->
<div class="container flex-grow-1">
