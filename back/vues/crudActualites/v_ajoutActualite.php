<!-- Add New -->
<div class="modal-dialog">
	<div class="modal-content">
			<center><h4 class="modal-title" id="myModalLabel">Ajouter une actualité</h4></center>
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
		
			<form method="POST" action="?action=CRUDActualites">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">titre :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="titre" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">contenu :</label>
						</div>
						<div class="col-sm-9">
							<textarea  id="contenu" class="form-control editor" value="1"  name="contenu" rows="5" > </textarea>
						</div>
						
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Date de publication :</label>
						</div>
						<div class="col-sm-9">
							<input type="date" class="form-control" name="datePublication" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">en ligne : </label>
						</div>
						<div class="col-sm-9">
							<input type="radio" id="0" name="actif" value="0" checked><label for="0">non</label>
							<input type="radio" id="1" name="actif" value="1"><label for="1">oui</label>
						</div>
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


<script>
    CKEDITOR.replace('contenu');
</script>