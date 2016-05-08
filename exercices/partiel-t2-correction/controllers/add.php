<?php 

	require_once './models/Expenses.class.php';
	$expensesModel = new Expenses();

	$title = 'Add';
	$class = 'add';

	// Data sent
	if(!empty($_POST))
	{
		$result = $expensesModel->add($_POST);
		
		$errors  = $result->errors;
		$success = $result->success;
	}

	// Get categories
	$query = $pdo->query('SELECT * FROM categories');
	$categories = $query->fetchAll();