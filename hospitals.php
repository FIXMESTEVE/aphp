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
				
				}
			?>