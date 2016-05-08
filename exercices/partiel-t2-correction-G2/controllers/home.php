<?php 

	$title = 'Mon site';
	$class = 'home';

	// Delete action
	if(!empty($_GET['action']) && $_GET['action'] == 'delete')
	{
		// Get params
		$id = (int)$_GET['id'];

		// Delete from DB
		$prepare = $pdo->prepare('DELETE FROM expenses WHERE id = :id');
		$prepare->bindValue('id',$id);
		$prepare->execute();
	}
	
	$query    = $pdo->query('SELECT * FROM expenses');
	$expenses = $query->fetchAll();
