<?php 

	$title = 'Mon site';
	$class = 'home';

	$success = array();

	// Delete expense
	if(!empty($_GET['action']) && $_GET['action'] == 'delete')
	{
		// Get value
		$id = (int)$_GET['id'];

		// Delete from DB
		$prepare = $pdo->prepare('DELETE FROM expenses WHERE id = :id');
		$prepare->bindValue('id',$id);
		$prepare->execute();

		$success['general'] = 'Dépense supprimée';
	}

	// Retrieve all expenses
	$query    = $pdo->query('SELECT * FROM expenses');
	$expenses = $query->fetchAll();