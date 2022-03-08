<!-- Add New -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Ajouter une nouvelle gamme</h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
		
			<form method="POST" action="?action=CRUDGammes">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">identifiant :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="id" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">libelle :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="libelle" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">pictogramme :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="picto" required style="margin-bottom:5%;">
						</div>
						<p><a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free" target="_blank">liste des pictogrammes possibles</a></p>
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
