<?php 

	$title = 'Ajouter';
	$class = 'add';

	$errors  = array();
	$success = array();

	// Form sent
	if(!empty($_POST))
	{
		// Get data
		$name     = strip_tags(trim($_POST['name']));
		$expenser = strip_tags(trim($_POST['expenser']));
		$amount   = (float)$_POST['amount'];

		// Handle errors
		if($name == '')
			$errors['name'] = 'Nom vide';

		if($amount < 0)
			$errors['amount'] = 'Montant inférieur à 0';
		if($amount == 0)
			$errors['amount'] = 'Montant égal à 0';

		// No errors
		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO expenses (name,amount,expenser) VALUES (:name,:amount,:expenser)');
			$prepare->bindValue('name',$name);
			$prepare->bindValue('amount',$amount);
			$prepare->bindValue('expenser',$expenser);
			$prepare->execute();

			$success[] = 'Dépense sauvegardée';
		}
	}