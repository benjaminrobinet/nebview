<?php
	include 'utils/config.php';
	include 'utils/Files.class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Files Viewer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/preview.js"></script>

	<style>
		#preview{
			position:absolute;
			border:1px solid #ccc;
			background:#333;
			display:none;
			color:#fff;
		}
		#preview img{
			max-width: 500px;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
			$files = new Files();
			$filesdata = $files->getFilesDataBy('mtime', SORT_DESC);

			if(!is_null($filesdata)){
				echo "
				<table class='table table-responsive'>
					<thead>
						<tr>
							<th>Nom</th>
							<th>Taille</th>
							<th>Dernière modification</th>
						</tr>
					</thead>
					<tbody>
				";
					foreach ($filesdata as $file) {
						echo "
						<tr>
							<td><a class=\"preview\" target=\"_blank\" href=\"" . UPLOAD . $file['filename'] . "\">" . $file['filename'] . "</a></td>
							<td>" . $file['filesize'] . " Mo</td>
							<td>" . date('H:i:s - d-m-Y', $file['filemtime']) . "</td>
						</tr>
						";
					
					}
				echo "
					</tbody>
				</table>
				";
			} else {
				echo "Aucun fichier présent dans \"" . UPLOAD . "\"";
			}
		?>
	</div>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
