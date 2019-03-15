<?php
// fonctions.php

## Une constante est une variable qui ne change pas.
// on défini ici des constantes, grâce à la fonction define('NOM_DE_LA_CONSTANTE', 'valeur')
// Par convention, on met le nom de la constante en MAJUSCULES
// Les valeurs sont alors accessibles partout (dans les scripts et les fonctions).
define('HOST','localhost'); // l'adresse du serveur de BDD
define('USER','root');		// nom d'utilisateur
define('PASS','');			// mot de passe

define('DB_NAME','hcc');	// nom de la base de donnée à utiliser

### Pour utiliser une constante,
### il suffit de la nommer, sans mettre de $ devant.
### il faut bien sûr l'avoir définie avant.

# On tente de se connecter (grace au try{}). Soit ça marche, soit on va récupérer une exception (= erreur) dans le catch()
try 
{
	# Connexion à la BDD
	$db = new PDO('mysql:host='.HOST.';dbname='.DB_NAME, USER, PASS);
	
	# Réglages d'attribut pour la connexion
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$db->exec('set names utf8');
}
# En cas d'erreur, on attrappe l'exception et on affiche l'erreur.
catch (PDOException $e) 
{
	die($e->getMessage()); // affiche l'erreur renvoyée
}

#########
# On peut aussi ajouter des fonctions perso dans se fichier.
?>