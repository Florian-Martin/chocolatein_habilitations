<!-- Edit -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Modifier le produit <?php echo $data['id']; ?></h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="?action=CRUDProduits">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">libelle :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nom" value="<?php echo $data['nom']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Description :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="description" value="<?php echo $data['description']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Packaging :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="packaging" value="<?php echo $data['packaging']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Image :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="urlimg" value="<?php echo $data['urlimg']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Gamme :</label>
						</div>
						<div class="col-sm-9">
							<select class="browser-default custom-select" name="idgamme" id="idgamme" required style="margin-bottom:5%;">
							<?php
							foreach($gammes as $uneGamme){
								$selected = "";
								if ($uneGamme['id'] == $data['idgamme']){
									$selected = "selected";
								}?>
								<option value="<?php echo $uneGamme['id']; ?>" <?php echo $selected; ?>><?php echo $uneGamme['id']; ?></option>
							<?php } ?>
						</select>
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