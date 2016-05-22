<?php

	class ExpensesModel
	{
		public function getAll()
		{
			global $pdo;

			$query = $pdo->query('
				SELECT
				    e.*, c.name AS category_name
				FROM
				    expenses AS e
				LEFT JOIN
				    categories AS c
				ON
				    e.id_category = c.id
			');
			$expenses = $query->fetchAll();

			return $expenses;
		}

		public function delete($id)
		{
			global $pdo;

			$id = (int)$id;

			$prepare = $pdo->prepare('DELETE FROM expenses WHERE id = :id');
			$prepare->bindValue('id',$id);
			$prepare->execute();
		}

		public function add($data)
		{
			global $pdo;

			// Set up messages
			$errors  = array();
			$success = array();

			// Get values
			$expenser    = strip_tags(trim($data['expenser']));
			$name        = strip_tags(trim($data['name']));
			$id_category = (int)$data['id_category'];
			$amount      = (float)strip_tags(trim($data['amount']));

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
				$prepare = $pdo->prepare('
					INSERT INTO
						expenses
						(id_category,name,amount,expenser)
					VALUES
						(:id_category,:name,:amount,:expenser)
				');
				$prepare->bindValue('id_category',$id_category);
				$prepare->bindValue('name',$name);
				$prepare->bindValue('amount',$amount);
				$prepare->bindValue('expenser',$expenser);
				$execute = $prepare->execute();

				$success[] = 'Dépense sauvegardée';
			}

			$result          = new stdClass();
			$result->errors  = $errors;
			$result->success = $success;

			return $result;
		}

		public function getAllCategories()
		{
			global $pdo;

			$query      = $pdo->query('SELECT * FROM categories');
			$categories = $query->fetchAll();

			return $categories;
		}
	}