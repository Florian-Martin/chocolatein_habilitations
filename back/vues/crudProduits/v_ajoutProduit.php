<!-- Add New -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Ajouter un nouveau produit</h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
		
			<form method="POST" action="?action=CRUDProduits" enctype="multipart/form-data">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Identifiant :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="id" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Nom :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nom" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Description :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="description" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Packaging :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="packaging" required style="margin-bottom:5%;">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Image :</label>
						</div>
						<div class="col-sm-9">
							Ajouter une image au format jpeg :
							<input accept="image/jpeg" type="file" name="fileToUpload" id="fileToUpload" class="form-control-file" value="" required>
							<img id="preview" class="w-50 img-fluid">
						</div>
						
					</div>
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Gamme :</label>
						</div>
						<div class="col-sm-9">
							<select class="browser-default custom-select" name="idgamme" id="idgamme" required >
								<?php
								foreach($gammes as $uneGamme){?>
									<option value="<?php echo $uneGamme['id']; ?>"><?php echo $uneGamme['id']; ?></option>
								<?php } ?>
							</select>
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
    $(document).ready(function (e) {
        $('input[type="file"]').on('change', (e) => {
            console.log('change file');
            let that = e.currentTarget
            if (that.files && that.files[0]) {
                $(that).next('.custom-file-label').html(that.files[0].name)
                let reader = new FileReader()
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result);
					$('#preview').attr('width', '200px')
                }
                reader.readAsDataURL(that.files[0])
            }
        })
    });
</script>