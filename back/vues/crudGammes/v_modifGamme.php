<!-- Edit -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Modifier la gamme <?php echo $data['id']; ?></h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="?action=CRUDGammes">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">libelle :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="libelle" value="<?php echo $data['libelle']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">pictogramme :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="picto" value="<?php echo $data['picto']; ?>">
							<p><a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free" target="_blank">liste des pictogrammes possibles</a></p>
						</div>

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