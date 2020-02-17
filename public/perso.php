<?php
// include "../donnees.inc.php";
include "../Alouette.php";
/* REDIRECTION */
if (!isset($_GET['membres'])) {
	header('location:formulaire.php');
	exit;
}
$membres = explode("\r\n", $_GET['membres']);

/* VALEURS PAR DÉFAUT (3 méthodes) */
$oiseau = "Alouette";
if (isset($_GET['oiseau'])) {
	$oiseau = $_GET['oiseau'];
}

if (isset($_GET['qualite'])) {
	$qualite = $_GET['qualite'];
} else {
	$qualite = "gentille";
}

$action = isset($_GET['action']) ? $_GET['action'] : "te plumerai";

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/alouette.css" />
		<title><?php echo Alouette::titre($oiseau, $qualite); ?></title>
	</head>
	<body>
        <div id="app">
            <?php include "../header.inc.php"; ?>
            <?php include "../footer.inc.php"; ?>
            <?php include "../menu.inc.php"; ?>
    		<div class="body">
                <h1><?php echo Alouette::titre($oiseau, $qualite); ?></h1>
                <?php echo Alouette::chanson($oiseau, $qualite, $action, $membres); ?>
            </div>
        </div>
	</body>
</html>
