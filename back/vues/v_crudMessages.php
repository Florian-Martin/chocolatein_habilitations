<!-- Modale documents vide -->
<div id="my_modal" class="modal"></div>

	<div class="row">
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
				<th>Date</th>
				<th>mail</th>
				<th>statut</th>
				<th></th>
			</thead>
			<tbody>
				<?php
				foreach ($messages as $row){
					?>
					<tr>
						<td><?= $row['date']; ?></td>
						<td><?= $row['mail']; ?></td>
						<td><?= $row['statut']; ?></td>
						<td>
							<?php
							if ($row['traite']){?>
								<a href='#my_modal' class='btn btn-info btn-sm' data-toggle='modal' onclick="chargeModale('<?= $row['id']; ?>', '#my_modal', 'voirMessage')"><span class='glyphicon glyphicon-edit'></span> Consulter</a>
							<?php } else { ?>
								<a href='#my_modal' class='btn btn-success btn-sm' data-toggle='modal' onclick="chargeModale('<?= $row['id']; ?>', '#my_modal', 'repondreMessage')"><span class='glyphicon glyphicon-edit'></span> Répondre</a>
							<?php } ?>
							
							<a href='#my_modal' class='btn btn-danger btn-sm' data-toggle='modal' onclick="chargeModale('<?= $row['id']; ?>', '#my_modal', 'suprMessage')"><span class='glyphicon glyphicon-trash'></span> Supprimer</a>
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


