<?php
/**
 * Vue affichant la liste des produits de toutes les gammes ou d'une gamme donnée
 *
 */
?>

<h1><?= $title ?></h1>

<div class="row">
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
				<th>Nom</th>
				<th>Description</th>
				<th>Packaging</th>
				<th>Image</th>
			</thead>
			<tbody>
            <?php
            foreach ($lesProduits as $row){
                ?>
                <tr>
                    <td><?= $row['nom']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['packaging']; ?></td>
                    <td><img src="<?= $row['urlimg']; ?>_300w.jpg" width="100px"/></td>
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