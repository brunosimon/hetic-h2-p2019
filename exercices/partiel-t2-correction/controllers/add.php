<?php 

	$title = 'Add';
	$class = 'add';

	// Data sent
	if(!empty($_POST))
	{
		// Set up
		$errors  = array();
		$success = array();

		// Retrieve values
		$expenser = trim(strip_tags($_POST['expenser']));
		$name     = trim(strip_tags($_POST['name']));
		$price    = trim(strip_tags($_POST['price']));

		// Handle errors
		if($name == '')
			$errors['name'] = 'Le nom ne doit pas être vide';

		if($price == '')
			$errors['price'] = 'Le prix ne doit pas être vide';
		else if($price < 0)
			$errors['price'] = 'Le prix ne peut être négatif';
		else if($price == 0)
			$errors['price'] = 'Le prix ne peut être nul';

		// No error
		if(empty($errors))
		{
			// Send to DB
			$prepare = $pdo->prepare('INSERT INTO expenses (expenser,name,price) VALUES (:expenser,:name,:price)');
			$prepare->bindValue('expenser',$expenser);
			$prepare->bindValue('name',$name);
			$prepare->bindValue('price',$price);
			$execute = $prepare->execute();

			if(!$execute)
			{
				$errors['general'] = 'Une erreur s\'est produite';
			}
			else
			{
				$success['general'] = 'Dépense ajoutée';
			}
		}
	}