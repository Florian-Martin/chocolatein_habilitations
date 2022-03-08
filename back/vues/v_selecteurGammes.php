<?php
/**
 * Vue affichant une liste déroulante des gammes
 *
 */
?>

<h1>Choix d'une gamme</h1>
<form method="POST" action="?action=catalogue">
    <select class="browser-default custom-select" name="id" id="idGamme" onchange="submit();">>
        <option value="" >Toutes les gammes</option>
        <?php
        foreach ($lesGammes as $uneGamme) {
            $selected = "";
            $idGamme = $uneGamme['id'];
            $libelleGamme = $uneGamme['libelle'];
            if (isset($idGammeSelected) && ($idGammeSelected == $idGamme)){
                $selected = "selected";
            }
            ?>
            <option value="<?= $idGamme ?>" <?= $selected ?> ><?= $libelleGamme ?></option>
        <?php
        }
        ?>
    </select>
</form>
<section class="row">
    <div class="card">
        <ul class="list-group list-group-flush">
            
        </ul>
    </div>
</section>