<?php
error_reporting(E_ALL);
include "../Alouette.php";
$affichage = '';
// var_dump($pdo->errorInfo());
// die;
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/alouette.css" />
		<title>Les chansons</title>
	</head>
	<body>
        <div id="app">
            <?php include "../header.inc.php"; ?>
            <?php include "../footer.inc.php"; ?>
            <?php include "../menu.inc.php"; ?>
    		<div class="body">
    			<h1>Les chansons</h1>
    			<div class="cadre">
    				<table>
    					<tr>
    						<th>
    							<a href="corbeau.php?id=1">Gentille Alouette, je te plumerai</a>
    						</th>
    					</tr>
    					<tr>
    						<th>
    							<a href="corbeau.php?id=3">Maître Corbeau, je vous charmerai</a>
    						</th>
    					</tr>
    					<tr>
    						<th>
    							<a href="corbeau.php?id=2">Voleuse Pie, je te pendrai</a>
    						</th>
    					</tr>
    				</table>
    			</div>
    			<?php echo $affichage; ?>
    		</div>        </div>
	</body>
</html>
