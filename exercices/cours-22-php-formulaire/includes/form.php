<?php 

$errors  = array();
$success = array();

// Data sent
if(!empty($_POST))
{
	// Create gender if not exist
	if(!isset($_POST['gender']))
		$_POST['gender'] = '';

	// Get variables
	$name   = strip_tags(trim($_POST['name']));
	$age    = trim($_POST['age']);
	$gender = strip_tags(trim($_POST['gender']));

	// Name errors
	if(empty($name))
		$errors['name'] = 'Name missing';

	// Age errors
	if(empty($age))
		$errors['age'] = 'Age missing';
	else if($age <= 0 || $age > 115)
		$errors['age'] = 'Wrong age';

	// Gender errors
	if(empty($gender))
		$errors['gender'] = 'Gender missing';
	else if(!in_array($gender, array('male','female')))
		$errors['gender'] = 'Wrong gender';

	// Success
	if(empty($errors))
	{
		// Add to database
		$prepare = $pdo->prepare('INSERT INTO users (name,age,gender) VALUES (:name,:age,:gender)');

		$prepare->bindValue('name',$name);
		$prepare->bindValue('age',$age);
		$prepare->bindValue('gender',$gender);

		$result = $prepare->execute();

		// DB error
		if(!$result)
		{
			$errors[] = 'Erreur lors de l\'enregistrement';
		}

		// Added well
		else
		{
			$success[] = 'Vous êtes maintenant enregistré';

			// Reset default post data
			$_POST['name']   = '';
			$_POST['age']    = '';
			$_POST['gender'] = '';
		}
	}
}

// No data sent
else
{
	// Set default post data
	$_POST['name']   = '';
	$_POST['age']    = '';
	$_POST['gender'] = '';
}

echo '<pre>';
print_r($_POST);
echo '</pre>';