<?php 

	$title = 'Ajouter';
	$class = 'add';

	// Set up messages
	$errors  = array();
	$success = array();

	// Form sent
	if(!empty($_POST))
	{
		// Get values
		$expenser = strip_tags(trim($_POST['expenser']));
		$name     = strip_tags(trim($_POST['name']));
		$amount   = (float)strip_tags(trim($_POST['amount']));

		// Errors
		if($name == '')
			$errors['name'] = 'Le nom ne peut être vide';

		if($amount < 0)
			$errors['amount'] = 'Le montant ne peut être inférieur à zéro';
		else if($amount == 0)
			$errors['amount'] = 'Le montant ne peut être égal à zéro';

		// No errors
		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO expenses (name,amount,expenser) VALUES (:name,:amount,:expenser)');
			$prepare->bindValue('name',$name);
			$prepare->bindValue('amount',$amount);
			$prepare->bindValue('expenser',$expenser);
			$execute = $prepare->execute();

			$success[] = 'Dépense sauvegardée';
		}
	}