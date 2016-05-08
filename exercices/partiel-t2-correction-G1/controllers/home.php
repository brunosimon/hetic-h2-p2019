<?php 

	$title = 'Mon site';
	$class = 'home';

	if(!empty($_GET['action']) && $_GET['action'] == 'delete')
	{
		$id = (int)$_GET['id'];

		$prepare = $pdo->prepare('DELETE FROM expenses WHERE id = :id');
		$prepare->bindValue('id',$id);
		$prepare->execute();
	}

	$query    = $pdo->query('SELECT * FROM expenses');
	$expenses = $query->fetchAll();

