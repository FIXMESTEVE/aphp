<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
	
	
		<?php
		
		// Connexion à la base de données
		
	try{
	$bdd = new PDO(
		'mysql:host=localhost;dbname=aphp', 'root', '',
		array(PDO::ATTR_ERRMODE =>
		PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e) {
		die('Erreur :'.$e->getMessage());
	};	
	
	// Encodage en UTF-8

	$bdd->query('set character_set_client=utf8');
	$bdd->query('set character_set_connection=utf8');
	$bdd->query('set character_set_results=utf8');
	$bdd->query('set character_set_server=utf8');
	
	// Définition de la requête
	
	$requete = "SELECT tab_hopital.hopital_trigramme, hopital_nom, hopital_adresse, hopital_latitude, hopital_longitude, urgences_type, urgences_public, urgences_horaire, urgences_tel ";
	$requete = $requete."FROM tab_hopital INNER JOIN tab_urgences ON tab_hopital.hopital_trigramme=tab_urgences.hopital_trigramme ";

	// Soumission de la reqête
	$resultat=$bdd->query($requete);
	
	// Récupération des données de la requête ligne à ligne
	
	$ligne=$resultat->fetch();
	while($ligne){
			echo ' Trigramme : '.$ligne['hopital_trigramme'].'<br />';
			echo ' Nom : '.$ligne['hopital_nom'].'<br />';
			echo ' Adresse : '.$ligne['hopital_adresse'].'<br />';
			echo ' Latitude : '.$ligne['hopital_latitude'].'<br />';
			echo ' Longitude : '.$ligne['hopital_longitude'].'<br />';
			echo ' Type d\'urgence : '.$ligne['urgences_type'].'<br />';
			echo ' Public : '.$ligne['urgences_public'].'<br />';
			echo ' Horaires : '.$ligne['urgences_horaire'].'<br />';
			echo ' Téléphone : '.$ligne['urgences_tel'].'<br /><br />'; 

			$ligne=$resultat->fetch();
	}
	
	
	// Fermeture du curseur d'analyse des résultats
	
	$resultat-> closeCursor();

	?>
	</body>

</html>