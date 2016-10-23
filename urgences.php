<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script
			  src="https://code.jquery.com/jquery-3.1.1.js"
			  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			  crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="./main_page.css">

		
	</head>
	
	<body>
		<div>
			<div id="choix" style="width: 22%; margin: 2px 5px 2em 10; display: inline-block; vertical-align: text-top; background-color: #F5F5F5; padding-left:15px; padding-right:15px; padding-bottom:15px; text-align: center;">
				<br />
				<img src="./logo.png" width="410" height="118" alt="KELHOSTO" title="KELHOSTO">
				<br /><br />
				
				<p id="blabla">En cas d'urgence immédiate, contactez sans attendre le <b>15</b> ou rendez-vous à l'hopital le plus proche sans tenir compte des temps d'attente affichés.</p>

				<br />
				
				<form method="post" target="droite" action="urgences.php">
				
					<b>L'urgence concerne-t-elle :</b>
					<div class="container">
						<div class="switch">
							<input type="radio" class="switch-input" name="age" value="Adultes" id="adultes" checked>
							<label for="adultes" class="switch-label switch-label-off">Adultes</label>
							<input type="radio" class="switch-input" name="age" value="Enfants" id="enfants">
							<label for="enfants" class="switch-label switch-label-on">< 16 ans</label>
							<span class="switch-selection"></span>
						 </div>
					</div>
							
					<b>S'agit-il d'une urgence concernant la main ?</b>
					<div class="container">
						<div class="switch switch-blue">
							<input type="radio" class="switch-input" name="main" value="Main" id="main">
							<label for="main" class="switch-label switch-label-off">Oui</label>
							<input type="radio" class="switch-input" name="main" value="non" id="non_main" checked>
							<label for="non_main" class="switch-label switch-label-on">Non</label>
							<span class="switch-selection"></span>
						 </div>
					</div>				

							
					<b>S'agit-il d'une urgence concernant la sphère ORL ?</b>
					<div class="container">
						<div class="switch switch-blue">
							<input type="radio" class="switch-input" name="ORL" value="ORL" id="ORL">
							<label for="ORL" class="switch-label switch-label-off">Oui</label>
							<input type="radio" class="switch-input" name="ORL" value="non" id="non_ORL" checked>
							<label for="non_ORL" class="switch-label switch-label-on">Non</label>
							<span class="switch-selection"></span>
						 </div>
					</div>				

							
					<b>S'agit-il d'une urgence concernant les yeux ?</b>
					<div class="container">
						<div class="switch switch-blue">
							<input type="radio" class="switch-input" name="oeil" value="Yeux" id="Yeux">
							<label for="Yeux" class="switch-label switch-label-off">Oui</label>
							<input type="radio" class="switch-input" name="oeil" value="non" id="non_oeil" checked>
							<label for="non_oeil" class="switch-label switch-label-on">Non</label>
							<span class="switch-selection"></span>
						 </div>
					</div>				

					<b>S'agit-il d'une urgence dentaire ?</b>
					<div class="container">
						<div class="switch switch-blue">
							<input type="radio" class="switch-input" name="dent" value="Dents" id="dents">
							<label for="dents" class="switch-label switch-label-off">Oui</label>
							<input type="radio" class="switch-input" name="dent" value="non" id="non_dents" checked>
							<label for="non_dents" class="switch-label switch-label-on">Non</label>
							<span class="switch-selection"></span>
						 </div>
					</div>	

					<b>S'agit-il d'une urgence de type gynécologique/maternité ?</b>
					<div class="container">
						<div class="switch switch-blue">
							<input type="radio" class="switch-input" name="gynecologie" value="Maternité" id="maternite">
							<label for="maternite" class="switch-label switch-label-off">Oui</label>
							<input type="radio" class="switch-input" name="gynecologie" value="non" id="non_gynecologie" checked>
							<label for="non_gynecologie" class="switch-label switch-label-on">Non</label>
							<span class="switch-selection"></span>
						 </div>
					</div>	
				
				<br />
				<input type="submit" id="buttonSubmit" name="submit" value="Afficher les hopitaux sélectionnés">
				</form>
				
				<a href src="./urgences.php"><input type="submit" id="buttonSubmit2" name="submit" value="Afficher tous les hopitaux"></a>
				
				<br /><br />
				
				<table width=100%><tr><td id="min"><b>Attente minimum</b></td><td id="max"><b>Attente maximum</b></td></tr></table>
				<img src="./scale.png" alt="Échelle de délai d'attente" title="Échelle de délai d'attente" width=100%>
			</div>
			
			<div id="map" style="width: 55%; height: 99%; margin: 0; display: inline-block; vertical-align: text-top;"></div>
			<!-- api_key=AIzaSyANMowT_Qg8arsSvXpNtVueE4edDOsdUsM& -->
			
			<div style="width:18%; margin: 2px 5px 2em 10px; display: inline-block; vertical-align: text-top; background-color: #F5F5F5; padding-left:10px; padding-right:10px;">
			
			<?php
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
				
				$requete = "SELECT med_ge_nom, med_ge_prenom, med_ge_adresse, med_ge_tel, med_ge_latitude, med_ge_longitude FROM tab_med_ge ";
				
				// Soumission de la reqête
				$resultat=$bdd->query($requete);
				
				
				// Récupération des données de la requête ligne à ligne
				echo "<table width=100%><tr width=100%><td id=\"mg\" width=50%><b>Médecins <br />Généralistes</b></td><td id=\"pas\" width=50%><b>Permanence <br />d'accès aux soins</b></td></tr></table><br />";
				while ($donnees = $resultat->fetch()){
					echo "<b id=\"dr\">Dr ".$donnees['med_ge_nom']." ".$donnees['med_ge_prenom']."</b><br />";
					echo $donnees['med_ge_adresse']."<br />";
					echo $donnees['med_ge_tel']."<br /><hr />";
				}
				
				echo "<div id=\"tel\"><div style=\"display: inline-block; vertical-align: text-top;\"><br /><img src=\"./tel.png\" alt=\"Logo SAMU\" title=\"Logo SAMU\" id=\"SAMU\"></div><div style=\"display: inline-block; vertical-align: text-top;\"><h1>Appeler le 15</h1></div></div>";
				// Fermeture du curseur d'analyse des résultats
				$resultat-> closeCursor();
			?>
			

			
			</div>
			
			<div id="hospitalsList" style="width: 0%; margin: 0; display: inline-block; display: none; vertical-align: text-top;">
			
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
				$results=$resultat->fetchAll();
				echo json_encode($results);
				
				// Fermeture du curseur d'analyse des résultats
				$resultat-> closeCursor();
				
				} else {
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
				$results=$resultat->fetchAll();
				echo json_encode($results);
				
				// Fermeture du curseur d'analyse des résultats
				$resultat-> closeCursor();
				};
			?>
			</div>

			<script src="main_js.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
			
		</div>
	</body>
</html>