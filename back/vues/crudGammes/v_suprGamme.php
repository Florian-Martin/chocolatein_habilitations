<!-- Delete -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<center><h4 class="modal-title" id="myModalLabel">Supprimer la gamme <?php echo $data['id']; ?></h4></center>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">	
			<p class="text-center">Etes-vous sure de vouloir supprimer la gamme <?php echo $data['id']; ?><br/>
			<i class="fas fa-<?= $data['picto']; ?>"></i> <?= $data['libelle']; ?>
			</p>
		</div>
		<div class="modal-footer">
			<form method="POST" action="?action=CRUDGammes">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
				<button type="submit" name="supr" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Oui</a>
			</form>
		</div>
	</div>
</div>