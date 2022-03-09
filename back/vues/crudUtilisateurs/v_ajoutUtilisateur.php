<!-- Add New -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Ajouter un nouveau Utilisateur</h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>

		<div class="modal-body">
			<form method="POST" action="?action=CRUDUtilisateurs">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
			
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Pseudo:</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="pseudo" required style="margin-bottom:5%;" >
						</div>
						<div class="col-sm-3">
							<label class="control-label modal-label">Email:</label>
						</div>
						<div class="col-sm-9">
							<input type="email" class="form-control" name="email" required style="margin-bottom:5%;">
						</div>
						<div class="col-sm-3">
							<label class="control-label modal-label">Rôle:</label>
						</div>
						<div class="col-sm-9">
							<select name="role" id="role" class="browser-default custom-select" required style="margin-bottom:5%;">
								<?php
								foreach($roles as $r){?>
										
									<option value="<?php echo $r['IDROLES']; ?>"><?php echo $r['nomRoles']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label modal-label">Mot de passe:</label>
						</div>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="mdp" required style="margin-bottom:5%;">
						</div>


						<!-- début partie nouvelle -->
						<div class="col-sm-4">
							<label class="control-label modal-label">Type de compte :</label>
						</div>
						<div class="col-sm-4">
							<input type="radio" id="permanent" name="estPermanent" value="1">
							<label for="permanent">permanent</label>
							<br/>
							<input type="radio" id="temporaire" name="estPermanent" value="0" checked>
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
							<input type="date" class="form-control" name="dateActivation" style="margin-bottom:5%;">
						</div>				
						<div class="col-sm-6">
							<input type="date" class="form-control" name="dateDesactivation" style="margin-bottom:5%;">
						</div>

						<!-- fin partie nouvelle -->

					</div>
				</div> 
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</a>
				</div>
			</form>
		</div>

	</div>
</div>