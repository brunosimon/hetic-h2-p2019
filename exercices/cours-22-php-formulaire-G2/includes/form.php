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

	[x] BDD
		[x] Config
		[x] Récupérer users
		[x] Afficher users
		[x] Sauvegarder user
		[x] Gérer erreur de sauvegarde
		[x] Gérer faille XSS
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
	$name   = strip_tags(trim($_POST['name']));
	$age    = strip_tags(trim($_POST['age']));
	$gender = strip_tags(trim($_POST['gender']));

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
		$prepare = $pdo->prepare('INSERT INTO users (name,age,gender) VALUES (:name,:age,:gender)');
		$prepare->bindValue('name',$name);
		$prepare->bindValue('age',$age);
		$prepare->bindValue('gender',$gender);
		$execute = $prepare->execute();

		if($execute)
		{
			$success[] = 'Utilisateur enregistré';

			// Reset values
			$name   = '';
			$age    = '';
			$gender = '';
		}
		else
		{
			$errors[] = 'Something wrong happened';
		}
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