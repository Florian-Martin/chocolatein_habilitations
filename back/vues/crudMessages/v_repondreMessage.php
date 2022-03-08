<!-- Edit -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Message de <?php echo $data['personne']; ?> reçu le <?php echo $data['date']; ?></h4></center>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
			<div>
				<b>Statut</b> : <?php echo $data['statut']; ?><br/>
				<b>mail de réponse</b> : <?php echo $data['mail']; ?><br/>
				<b>numéro de téléphone</b> : <?php echo $data['telephone']; ?><br/>
				<b>ville</b> : <?php echo $data['ville']; ?><br/>
				<b>site web</b> : <?php echo $data['site']; ?><br/>
				<b>Message</b> : <?php echo $data['message']; ?><br/>
			</div>
			<hr>

			<form method="POST" action="?action=CRUDMessages">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label modal-label">Commentaire sur le traitement de la demande :</label>
						</div>
						<div class="col-sm-9">
							<textarea  id="commentaire" class="form-control editor" value="1"  name="commentaire" rows="5"> </textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="done" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Marquer comme traité</button>
				</div>
			</form>

<script>
	CKEDITOR.replace('contenu');
	CKEDITOR.replace('commentaire');
</script>