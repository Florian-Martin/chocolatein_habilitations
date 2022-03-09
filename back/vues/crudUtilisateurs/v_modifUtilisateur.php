<!-- Edit -->
<div class="modal-dialog  modal-lg">
	<div class="modal-content">
		<div class="modal-header">
		<center><h4 class="modal-title" id="myModalLabel">Modifier Utilisateur</h4></center>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="?action=CRUDUtilisateurs">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<input type="hidden" class="form-control" name="id" value="<?php echo $data['IDUTILISATEURS']; ?>">
					<div class="col-sm-3">
					<label class="control-label modal-label">Pseudo:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="pseudo" required style="margin-bottom:5%;" value="<?php echo $data['pseudo']; ?>">
					</div>
					<div class="col-sm-3">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-9">
						<input type="email" class="form-control" name="email" required style="margin-bottom:5%;" value="<?php echo $data['mail']; ?>">
					</div>

					<div class="col-sm-6">
						<label class="control-label modal-label">Type de compte :</label>
					</div>
					<?php
						$estPermanent = "";
						$estPasPermanent = "checked";
						if ($data['permanent'] == 1){
							$estPermanent = "checked";
							$estPasPermanent = "";
						}
					?>
					<div class="col-sm-6">
						<input type="radio" id="permanent" name="estPermanent" value="1" <?= $estPermanent; ?>>
						<label for="permanent">permanent</label>
						<input type="radio" id="temporaire" name="estPermanent" value="0" <?= $estPasPermanent; ?>>
						<label for="temporaire">temporaire</label>
					</div>
				
					
					<div class="col-sm-12" style="margin-top:10%;">Si ce compte est un compte temporaire, indiquez ses dates de début et de fin d'activation </div>

					<div class="col-sm-6">
						<label class="control-label modal-label">Date d'activation :</label>
					</div>
					<div class="col-sm-6">
						<label class="control-label modal-label">Date de désactivation :</label>
					</div>
					<div class="col-sm-6">
						<input type="date" class="form-control" name="dateActivation" style="margin-bottom:5%;" value="<?= $data['dateActivation']; ?>">
					</div>				
					<div class="col-sm-6">
						<input type="date" class="form-control" name="dateDesactivation" style="margin-bottom:5%;" value="<?= $data['dateDesactivation']; ?>">
					</div>

					

					<div class="col-sm-12">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th scope="col">liste des habilitations</th>
									<th scope="col">date de début</th>
									<th scope="col">date de fin</th>
									<th scope="col">habilitation</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($lesHabilitations as $page){
								$couleur = "danger";
								if ($page['habilite'] == 1){
									$couleur = "success";
								}
								?>
								<tr class="table-<?= $couleur?>">
									<td ><?= $page['texteMenu']?></td>
									<?php 
									if ($page['habilitation']){
										$estPermanent = "";
										$estPasPermanent = "checked";
										if ($page['habilitation']['permanent'] == 1){
											$estPermanent = "checked";
											$estPasPermanent = "";
										}
										
										?>
										<td>
											<input type="date" class="form-control" name="habilitations[<?= $page['id']?>][dateDebut]" value="<?= $page['habilitation']['dateDebut']?>" >
										</td>

										<td>
											<input type="date" class="form-control" name="habilitations[<?= $page['id']?>][dateFin]" value="<?= $page['habilitation']['dateFin']?>" >
										</td>
										
										<td>
											<input type="radio" id="permanent" name="habilitations[<?= $page['id']?>][habilitationPermanente]" value="1" <?= $estPermanent?> >
											<label for="permanent">permanente</label>
											<br/>
											<input type="radio" id="temporaire" name="habilitations[<?= $page['id']?>][habilitationPermanente]" value="0" <?= $estPasPermanent?>>
											<label for="temporaire">temporaire</label>
										</td>
									<?php
									} 
									else 
									{
									?>

										<td>			
											<input type="date" class="form-control" name="habilitations[<?= $page['id']?>][dateDebut]" >
										</td>

										<td>
											<input type="date" class="form-control" name="habilitations[<?= $page['id']?>][dateFin]" >
										</td>
										
										<td>
											<input type="radio" id="permanent" name="habilitations[<?= $page['id']?>][habilitationPermanente]" value="1">
											<label for="permanent">permanente</label>
											<br/>
											<input type="radio" id="temporaire" name="habilitations[<?= $page['id']?>][habilitationPermanente]" value="0" checked>
											<label for="temporaire">temporaire</label>
										</td>

									<?php
									}?>
									</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>	
	
				</div> 
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modifier</a>
				</div>
			</form>
		</div>
	</div>
</div>
