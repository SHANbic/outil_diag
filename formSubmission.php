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
	$formation_digitale = $_POST['formation_digitale'];
	$projet_digital = $_POST['projet_digital'];
	$interlocuteurs = $_POST['interlocuteurs'];
	$submit = $_POST['submit']; 
	if (!empty($_POST['commentaire1'])) $commentaire = $_POST['commentaire1'] ;
	elseif (!empty($_POST['commentaire2'])) $commentaire = $_POST['commentaire2'] ;
	 
	//on écrit notre requête SQL
	$sql = "INSERT INTO prospects 
				VALUES (null, -- champ ID
						:email, 
						:structure,
						:formation_digitale, 
						:projet_digital,
						:interlocuteurs,
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
		$insert->bindparam(':formation_digitale', htmlspecialchars($formation_digitale), PDO::PARAM_STR);
		$insert->bindparam(':projet_digital', htmlspecialchars($projet_digital), PDO::PARAM_STR);
		$insert->bindparam(':interlocuteurs', htmlspecialchars($interlocuteurs), PDO::PARAM_STR);
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
