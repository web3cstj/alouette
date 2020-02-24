<?php
include "../donnees.inc.php";
include "../Alouette.php";
$affichage = '';
if (isset($_POST['composer'])) {
	$oiseau = $_POST['oiseau'];
	$qualite = $_POST['qualite'];
	$action = $_POST['action'];
	$membres = $_POST['membres'];
	$membres = explode("\r\n", $membres);
}
$chanson = new Alouette($oiseau, $qualite, $action, $membres);
$affichage .= $chanson->chanson();
$affichage .= $chanson->form("post");

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/alouette.css" />
		<title>Composer ma chanson</title>
	</head>
	<body>
        <div id="app">
            <?php include "../header.inc.php"; ?>
            <?php include "../footer.inc.php"; ?>
            <?php include "../menu.inc.php"; ?>
    		<div class="body">
				<h1>Composer ma chanson</h1>
				<?php echo $affichage; ?>
            </div>
        </div>
	</body>
</html>
