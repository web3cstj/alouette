<?php
include "alouette.inc.php";
// Consignes : reproduire le fonctionnement de la page modèle en utilisant
//   les variables contenues dans le fichier 'alouette.inc.php'.
// Indice : On a besoin de 2 boucles imbriquées.
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="alouette.css" />
		<title><?php echo $oiseau; ?>, <?php echo $qualite; ?> <?php echo $oiseau; ?></title>
	</head>
	<body>
		<?php include "menu.inc.php"; ?>
		<h1><?php echo $oiseau; ?>, <?php echo $qualite; ?> <?php echo $oiseau; ?></h1>
		<div class="chanson">
			<?php $membres_dits = array(); ?>
			<?php foreach ($membres as $membre) { ?>
			<div class="strophe">
				<div class="refrain">
					<div class="appel">
						<div><?php echo $oiseau; ?>, <?php echo $qualite; ?> <?php echo $oiseau; ?></div>
						<div><?php echo $oiseau; ?>, je <?php echo $action; ?>.</div>
					</div>
					<div class="reponse">
						<div><?php echo $oiseau; ?>, <?php echo $qualite; ?> <?php echo $oiseau; ?></div>
						<div><?php echo $oiseau; ?>, je <?php echo $action; ?>.</div>
					</div>
				</div>
				<div class="appel">Je <?php echo $action; ?> <?php echo $membre; ?></div>
				<div class="reponse">Je <?php echo $action; ?> <?php echo $membre; ?></div>
				<?php array_unshift($membres_dits, $membre); ?>
				<?php foreach ($membres_dits as $membre_dit) { ?>
				<div class="appel">Et <?php echo $membre_dit; ?></div>
				<div class="reponse">Et <?php echo $membre_dit; ?></div>
				<?php } ?>
				<div class="appel"><?php echo $oiseau; ?></div>
				<div class="reponse"><?php echo $oiseau; ?></div>
				<div>Aaaah . . . </div>
			</div>
			<?php } ?>
		</div>
	<?php include_once "../source.php"; ?></body>
</html>
