<?php 

/*
	TODO
	[x] Form
		[x] in_array pour gérer le genre
		[x] afficher les erreurs
		[x] remplir tableau success
		[x] afficher les success
		[x] Valeurs par défaut
		[x] Reset valeurs si validé

	[ ] BDD
		[ ] Config
		[ ] Récupérer users
		[ ] Afficher users
		[ ] Sauvegarder user
		[ ] Gérer erreur de sauvegarde
		[ ] Gérer faille XSS
*/

$errors  = array();
$success = array();
$name    = '';
$age     = '';
$gender  = '';

// Data sent
if(!empty($_POST))
{
	// Default gender
	if(!isset($_POST['gender']))
		$_POST['gender'] = '';

	// Set variables
	$name   = trim($_POST['name']);
	$age    = trim($_POST['age']);
	$gender = trim($_POST['gender']);

	// Name error
	if(empty($name))
		$errors['name'] = 'Missing name';

	// Age error
	if(empty($age))
		$errors['age'] = 'Missing age';
	else if($age < 0 || $age > 120)
		$errors['age'] = 'Impossible age';

	// Gender error
	if(empty($gender))
		$errors['gender'] = 'Missing gender';
	else if(!in_array($gender,['male','female']))
		$errors['gender'] = 'Impossible gender';

	// Success
	if(empty($errors))
	{
		$success[] = 'Utilisateur enregistré';

		// Reset values
		$name   = '';
		$age    = '';
		$gender = '';
	}
}
// No data sent
else
{
	
}

echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($errors);
echo '</pre>';