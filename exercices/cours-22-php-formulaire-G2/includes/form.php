<?php 

/*
	TODO
	[ ] Form
		[ ] in_array pour gérer le genre
		[ ] afficher les erreurs
		[ ] remplir tableau success
		[ ] afficher les success
		[ ] Valeurs par défaut
		[ ] Reset valeurs si validé

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
	else if($gender != 'male' && $gender != 'female')
		$errors['gender'] = 'Impossible gender';
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