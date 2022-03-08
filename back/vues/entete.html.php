<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="vues/css/images/favicon.ico">
		<meta name="author" content="Tiphaine Accary Barbier">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="robots" content="index,follow,all" />
		<title><?php echo $title; ?></title>

		<link rel="stylesheet" type="text/css" href="vues/css/style.css">
		<link rel="stylesheet" type="text/css" href="vues/css/menuVertical.css">
		<link href="vues/css/fontawesome/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.cs">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

		<script src="bibliotheques/perso/fonctions.js"></script>

		<script   src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js "></script>
		<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- bibliotheque ckeditor éditeur riche intégré -->
		<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
		
	
		<script type="text/javascript">
			// Include this file AFTER both jQuery and bootstrap are loaded.
			$.fn.modal.Constructor.prototype.enforceFocus = function() {
			modal_this = this
			$(document).on('focusin.modal', function (e) {
				if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_textarea')
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
				modal_this.$element.focus()
				}
			})
			};
		</script>

		
	</head>
	<body>
		<nav id="mySidebar" class="sidebar couleur">
			<?php include "menu.html.php"; ?>
		</nav>

		<!-- Page content holder -->
			
		

			<header>
				<span class="flex"><a href="./?action=accueil"><img src="vues/css/images/logo_transparent_300w.png" alt="Chocolate'in"/></a> <?= $title ?></span>
			</header>

			<div class="container content">