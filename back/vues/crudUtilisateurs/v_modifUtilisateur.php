<!-- Edit -->
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<center><h4 class="modal-title" id="myModalLabel">Modifier Utilisateur</h4></center>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="?action=CRUDUtilisateurs">
				<input type="hidden" id="token" name="token" value="<?= $token ?>">
				<div class="container-fluid">
					<input type="hidden" class="form-control" name="id" value="<?php echo $data['IDUTILISATEURS']; ?>">
					<div class="col-sm-2">
					<label class="control-label modal-label">Pseudo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pseudo" required style="margin-bottom:5%;" value="<?php echo $data['pseudo']; ?>">
					</div>
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" required style="margin-bottom:5%;" value="<?php echo $data['mail']; ?>">
					</div>
					
					<div class="col-sm-2">
						<label class="control-label modal-label">Rôle:</label>
					</div>
					<div class="col-sm-10">
						<select class="browser-default custom-select" name="role" id="role">
							<?php
							foreach($roles as $r){
									if($data['role'] == $r['IDROLES']){?>
										<option value="<?php echo $r['IDROLES']; ?>" selected><?php echo $r['nomRoles']; ?></option>
									<?php }else{
								?>
								<option value="<?php echo $r['IDROLES']; ?>"><?php echo $r['nomRoles']; ?></option>
							<?php } }?>
						</select>
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
