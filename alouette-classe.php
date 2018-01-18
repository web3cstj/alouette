<?php
require_once('alouette.inc.php');
require_once('alouette.class.php');
// Consignes : reproduire le fonctionnement de la page modèle en utilisant
//   les variables contenues dans le fichier 'alouette.inc.php'.
$titre = Alouette::titre($oiseau, $qualite);
$affichage = '';
$affichage .= '<h1>'.$titre.'</h1>';
$affichage .= Alouette::chanson($oiseau, $qualite, $action, $membres);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="alouette.css" />
<title><?php echo $titre ?></title>
</head>
<body>
<?php echo $affichage ?>
<?php include_once "../source.php"; ?></body>
</html>
