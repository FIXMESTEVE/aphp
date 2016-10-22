<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="main_js.js"></script>
	</head>
	
	<body>
		<h1 align=center>KELHOSTO</h1>
		<div>
			<div style="width: 24%; margin: 0; display: inline-block; vertical-align: text-top;">
				
				<br /><br />
				
				<p>Il n'y a jamais d'attentes pour les urgences immédiates.<br />
				En cas d'urgence immédiate, contactez sans attendre le <b>15</b>.</p>

				<br /><br />
				
				<form method="post" target="droite" action="urgences.php">
					<fieldset>
						L'urgence concerne-t-elle :<br />
						<input type="radio" name="age" value="Adultes" checked >Adultes
						<input type="radio" name="age" value="Enfants">Moins de 16 ans
						
						<br /><br />
						
						S'agit-il d'une urgence concernant la main ?<br />
						<input type="radio" name="main" value="Main">Oui
						<input type="radio" name="main" value="non" checked >Non
						
						<br /><br />
						
						S'agit-il d'une urgence concernant la sphère ORL (gorge...) ?<br />
						<input type="radio" name="ORL" value="ORL">Oui
						<input type="radio" name="ORL" value="non" checked >Non
						
						<br /><br />
						
						S'agit-il d'une urgence concernant les yeux ?<br />
						<input type="radio" name="oeil" value="Yeux">Oui
						<input type="radio" name="oeil" value="non" checked >Non

						<br /><br />

						S'agit-il d'une urgence dentaire ?<br />
						<input type="radio" name="dent" value="Dents">Oui
						<input type="radio" name="dent" value="non" checked >Non

						<br /><br />
						
						S'agit-il d'une urgence de type gynécologique/maternité ?<br />
						<input type="radio" name="gynecologie" value="Maternité">Oui
						<input type="radio" name="gynecologie" value="non" checked >Non

						<br /><br />
						
						<input type="submit" id="buttonSubmit" name="submit" value="Envoyer">
						<input type="reset" name="reset" value=" Annuler ">
						<a href="liste.php" target="droite"> <input type="button" value="Afficher tous les services d'urgences"> </a>
					</fieldset>
				</form>
			</div>
			
			<div id="map" style="width: 50%; height: 100%; margin: 0; display: inline-block; vertical-align: text-top;"></div>
			<!-- api_key=AIzaSyANMowT_Qg8arsSvXpNtVueE4edDOsdUsM& -->
			<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
			
			<div style="width: 24%; margin: 0; display: inline-block; vertical-align: text-top;">
			
				<?php
				
				if (isset($_POST['age'])){
				
				// Connexion à la base de données
				
				if ($_POST['main']=='Main') {
					$specialite="Main";
				} elseif ($_POST['ORL']=="ORL"){
					$specialite="ORL";
				} elseif ($_POST['oeil']=="Yeux"){
					$specialite="Yeux";
				} elseif ($_POST['dent']=="Dents"){
					$specialite="Dents";
				} elseif ($_POST['gynecologie']=="Maternité"){
					$specialite="Maternité";
				} else $specialite="Générales";
					
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
				$requete = $requete."WHERE urgences_public='".$_POST['age']."' AND urgences_type='".$specialite."';";	
				
				// Soumission de la reqête
				$resultat=$bdd->query($requete);
				
				
				// Récupération des données de la requête ligne à ligne
				$results=$resultat->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($results);
				
				// Fermeture du curseur d'analyse des résultats
				$resultat-> closeCursor();
				
				} else {};
			?>
			</div>
		</div>
	</body>
</html>