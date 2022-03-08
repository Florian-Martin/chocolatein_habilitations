<!-- Modale documents vide -->
<div id="my_modal" class="modal"></div>

	<div class="row">
		<div class="col">
			<a href="#my_modal" data-toggle="modal" class="btn btn-primary" onclick="chargeModale(null, '#my_modal', 'ajoutProduit')"><span class="glyphicon glyphicon-plus"></span> Ajouter</a>
		</div>
		<div class="col">
		<?php
			if(isset($_SESSION['error'])){
				echo
				"
				<div class='alert alert-danger text-center'>
					<button class='close'>&times;</button>
					".$_SESSION['error']."
				</div>
				";
				unset($_SESSION['error']);
			}
			if(isset($_SESSION['success'])){
				echo
				"
				<div class='alert alert-success text-center'>
					<button class='close'>&times;</button>
					".$_SESSION['success']."
				</div>
				";
				unset($_SESSION['success']);
			}
		?>
		</div>
	</div>	
	<div class="height10"></div>
	<div class="row">
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
				<th>Nom</th>
				<th>Description</th>
				<th>Packaging</th>
				<th>Image</th>
				<th>Gamme</th>
				<th></th>
			</thead>
			<tbody>
				<?php
				foreach ($produits as $row){
					?>
					<tr>
						<td><?= $row['nom']; ?></td>
						<td><?= $row['description']; ?></td>
						<td><?= $row['packaging']; ?></td>
						<td><img src="<?= $row['urlimg']; ?>.jpg" width="100px"/></td>
						<td><?= $row['idgamme']; ?></td>
						<td>
							<a href='#my_modal' class='btn btn-success btn-sm' data-toggle='modal' onclick="chargeModale('<?= $row['id']; ?>', '#my_modal', 'modifProduit')"><span class='glyphicon glyphicon-edit'></span> Modifier</a>
							<a href='#my_modal' class='btn btn-danger btn-sm' data-toggle='modal' onclick="chargeModale('<?= $row['id']; ?>', '#my_modal', 'suprProduit')"><span class='glyphicon glyphicon-trash'></span> Supprimer</a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>

<!-- generate datatable on our table -->
<script>
	$(document).ready(function(){
		//inialize datatable
		$('#myTable').DataTable();

		//hide alert
		$(document).on('click', '.close', function(){
			$('.alert').hide();
		})
	});

</script>


