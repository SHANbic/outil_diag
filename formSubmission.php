<?php

session_start();


require "fonctions.php";


/* echo "<pre>";
var_dump($_POST);
echo "</pre>"; */  


// on alimente la BDD avec les infos du prospect

if(!empty($_POST['submit']))// on vérifie que le submit ait bien été envoyé depuis le formulaire
{ 
	
	
	// et on créé les variables pour chaque données
	$email = $_POST['email'];
	$structure = $_POST['structure'];
	$decisionnaire = $_POST['decisionnaire'];
	$formation = $_POST['formation'];
	$interesse_par = $_POST['interesse_par'];
	$priorite = $_POST['priorite'];
	$autre_interlocuteur = $_POST['autre_interlocuteur'];
	$avis_equipe_transformation_digitale = $_POST['avis_equipe_transformation_digitale'];
	$crainte = $_POST['crainte'];
	$ressources_humaines = $_POST['ressources_humaines'];
	$clients_et_appareils_numeriques = $_POST['clients_et_appareils_numeriques'];
	$clients_et_reseaux_sociaux = $_POST['clients_et_reseaux_sociaux'];
	$impact_numerisation = $_POST['impact_numerisation'];
	$transformation_digitale_concurrent = $_POST['transformation_digitale_concurrent'];
	$veille_concurrentielle = $_POST['veille_concurrentielle'];
	$besoins = $_POST['besoins'];
	$submit = $_POST['submit']; 
	if (!empty($_POST['commentaire1'])) $commentaire = $_POST['commentaire1'] ;
	elseif (!empty($_POST['commentaire2'])) $commentaire = $_POST['commentaire2'] ;
	elseif (!empty($_POST['commentaire3'])) $commentaire = $_POST['commentaire3'] ;
	 
	//on écrit notre requête SQL
	$sql = "INSERT INTO prospects 
				VALUES (null, -- champ ID
						:email, 
						:structure,
						:decisionnaire, 
						:formation,
						:interesse_par,
						:priorite,
						:autre_interlocuteur,
						:avis_equipe_transformation_digitale,
						:crainte,
						:ressources_humaines,
						:clients_et_appareils_numeriques,
						:clients_et_reseaux_sociaux,
						:impact_numerisation,
						:transformation_digitale_concurrent,
						:veille_concurrentielle,
						:besoins,
						:commentaire, 
						NOW())"; 
						
	try 
	{
		# On lance la préparation de la requête
		$insert = $db->prepare($sql);

		# On lie les valeurs aux marqueurs de la requête en sécurisant les données entrantes
		#j'opte pour htmlspecialchars car htmlentities ne permet pas une restitution correcte des caractères accentués
		$insert->bindparam(':email', htmlspecialchars($email), PDO::PARAM_STR);
		$insert->bindparam(':structure', htmlspecialchars($structure), PDO::PARAM_STR);
		$insert->bindparam(':decisionnaire', htmlspecialchars($decisionnaire), PDO::PARAM_STR);
		$insert->bindparam(':formation', htmlspecialchars($formation), PDO::PARAM_STR);
		$insert->bindparam(':interesse_par', htmlspecialchars($interesse_par), PDO::PARAM_STR);
		$insert->bindparam(':priorite', htmlspecialchars($priorite), PDO::PARAM_STR);
		$insert->bindparam(':autre_interlocuteur', htmlspecialchars($autre_interlocuteur), PDO::PARAM_STR);
		$insert->bindparam(':avis_equipe_transformation_digitale', htmlspecialchars($avis_equipe_transformation_digitale), PDO::PARAM_STR);
		$insert->bindparam(':crainte', htmlspecialchars($crainte), PDO::PARAM_STR);
		$insert->bindparam(':ressources_humaines', htmlspecialchars($ressources_humaines), PDO::PARAM_STR);
		$insert->bindparam(':clients_et_appareils_numeriques', htmlspecialchars($clients_et_appareils_numeriques), PDO::PARAM_STR);
		$insert->bindparam(':clients_et_reseaux_sociaux', htmlspecialchars($clients_et_reseaux_sociaux), PDO::PARAM_STR);
		$insert->bindparam(':impact_numerisation', htmlspecialchars($impact_numerisation), PDO::PARAM_STR);
		$insert->bindparam(':transformation_digitale_concurrent', htmlspecialchars($transformation_digitale_concurrent), PDO::PARAM_STR);
		$insert->bindparam(':veille_concurrentielle', htmlspecialchars($veille_concurrentielle), PDO::PARAM_STR);
		$insert->bindparam(':besoins', htmlspecialchars($besoins), PDO::PARAM_STR);
		$insert->bindparam(':commentaire', htmlspecialchars($commentaire), PDO::PARAM_STR);

		# On exécute la requête
		$insert->execute();
	} 
	catch (Exception $e) 
	{
		# En cas d'erreur, on stoppe le script et on affiche un message
		die($e->getMessage());
	}



//  depuis la BDD, on sert au prospect les éléments de réponse logiques suite son parcours
$sql= "SELECT pack, contenu, prix FROM solution WHERE id=$submit";
$solution = $db->prepare($sql);
$solution->execute();
$data = $solution->fetch();


$_SESSION['data'] =  $data; // on stocke les résultats dans une session 
header("location: index.php"); // et on recharge la page index.php avec les infos contenues dans $data
}
