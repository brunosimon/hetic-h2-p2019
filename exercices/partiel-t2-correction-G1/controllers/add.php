<?php 

	require_once 'models/expenses.class.php';
	$expensesModel = new ExpensesModel();

	$title = 'Ajouter';
	$class = 'add';

	// Form sent
	if(!empty($_POST))
	{
		$result  = $expensesModel->add($_POST);
		$errors  = $result->errors;
		$success = $result->success;
	}

	$categories = $expensesModel->getAllCategories();
