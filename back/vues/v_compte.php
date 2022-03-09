<div>
    <h1 class="page-header text-center">Mes informations personnelles</h1>
    <p class="text-center">Pseudo : <?= $user['pseudo'] ?></p>
    <p class="text-center">Mail : <?= $user['mail'] ?></p>
    <p class="text-center">Rôle : <?= $user['nomRoles'] ?></p>

    <table class="table table-bordered text-center">
        <thead>
			<tr>
				<th scope="col">Liste des habilitations</th>
				<th scope="col">date de début</th>
				<th scope="col">date de fin</th>
				<th scope="col">habilitation</th>
			</tr>
		</thead>
		<tbody>
		<?php 
       
        foreach($lesHabilitations as $page){
            $couleur = "danger";
            if ($page['habilite'] == 1){
                $couleur = "success";
            }
        ?>
            <tr class="table-<?= $couleur?>">
				<?php 
				$permanent = "";
				if (($page['habilitation']) && ($page['habilitation']['permanent'] == 1)){
					$permanent = "permanente";
				} else {
					$permanent = "temporaire";
				}
				
				?>
				<td ><?= $page['description']?></td>
				<td>
					<?= $page['habilitation']['dateDebut']?>
				</td>

				<td>
					<?= $page['habilitation']['dateFin']?>
				</td>
				
				<td>
					<?= $permanent?>
				</td>
            </tr>
        <?php
        }?>
        </tbody>
    </table>

</div>