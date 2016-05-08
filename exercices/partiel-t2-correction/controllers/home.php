<?php 

	require_once './models/Expenses.class.php';
	$expensesModel = new Expenses();

	$title = 'Mon site';
	$class = 'home';

	// Delete expense
	if(!empty($_GET['action']) && $_GET['action'] == 'delete')
		$expensesModel->delete($_GET['id']);

	// Retrieve all expenses
	$expenses = $expensesModel->getAll();
