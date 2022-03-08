<?php
/**
 * Vue affichant la liste des produits dans une gamme donnée
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
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent px-0">
        <li class="breadcrumb-item"><a href="?uc=accueil"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active"><a href="?uc=gamme">Actualités</a></li>
    </ol>
</nav>
<section class="row">
    <h1 class="col-md-12">Nos actualités</h1>
    <?php
    foreach ($lesActualites as $uneActualite) {
        $titre = $uneActualite['titre'];
        $contenu = $uneActualite['contenu'];
        $datePublication = $uneActualite['datepublication'];
        ?>
        <article class="card col-md-12 p-2">
            <div class="card col border-choc">
                <div class="card-body py-0">
                    <h5 class="card-title mb-0"><?= $titre ?></h5>
                    <small class="card-text"><?= $datePublication ?></small>
                </div>
                <div class="card-body py-0">
                    <?= $contenu ?>
                </div>
            </div>
        </article>
        <?php
    }
    ?>
</section>
