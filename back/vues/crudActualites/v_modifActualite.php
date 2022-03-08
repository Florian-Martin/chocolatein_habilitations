<!-- Edit -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Modifier l'actualité <?php echo $data['titre']; ?></h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="?action=CRUDActualites">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">titre :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="titre" value="<?php echo $data['titre']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">contenu :</label>
						</div>
						<div class="col-sm-9">
							<textarea  id="contenu" class="form-control editor" value="1"  name="contenu" rows="5" > <?php echo $data['contenu']; ?></textarea>
						</div>
						
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">date de publication :</label>
						</div>
						<div class="col-sm-9">
							<input type="date" class="form-control" name="datePublication" value="<?php echo $data['datepublication']; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">en ligne : (0/1)</label>
						</div>
						<div class="col-sm-9">
							<input type="radio" id="0" name="actif" value="0" <?php if ($data['actif'] == 0){echo "checked";} ?>><label for="0">non</label>
							<input type="radio" id="1" name="actif" value="1" <?php if ($data['actif'] == 1){echo "checked";} ?>><label for="1">oui</label>
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


<script>
    CKEDITOR.replace('contenu');
</script>