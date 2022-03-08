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
			Cette demande a été traitée le <?php echo $data['datetraitement']; ?>
			avec le commentaire suivant : <br/>
			<?php echo $data['commentaire']; ?>

			
		</div>
	</div>
</div>


<script>
    /*CKEDITOR.replace('contenu', {
		extraPlugins: 'editorplaceholder',
      	editorplaceholder: 'Start typing here...'
	});*/
	CKEDITOR.replace('contenu');
	
</script>