<!-- Delete -->
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center><h4 class="modal-title" id="myModalLabel">Supprimer le message de <?php echo $data['personne']; ?> reçu le <?php echo $data['date']; ?></h4></center>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">	
            <p class="text-center">Etes-vous sure de vouloir supprimer le message de <?php echo $data['personne']; ?> reçu le <?php echo $data['date']; ?> ?)      
        </p>
        </div>
        <div class="modal-footer">
            <form method="POST" action="?action=CRUDMessages">
                <input type="hidden" id="token" name="token" value="<?= $token ?>">
                <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">

                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" name="supr" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Oui</a>
            </form>
        </div>

    </div>
</div>