<?php 

	require_once 'models/expenses.class.php';
	$expensesModel = new ExpensesModel();

	$title = 'Mon site';
	$class = 'home';

	if(!empty($_GET['action']) && $_GET['action'] == 'delete')
		$expensesModel->delete($_GET['id']);

	$expenses = $expensesModel->getAll();


