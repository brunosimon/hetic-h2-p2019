<?php

	class ExpensesModel
	{
		public function getAll()
		{
			global $pdo;

			$query = $pdo->query('
				SELECT
				    e.*,c.name AS category_name
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
			
			// Get params
			$id = (int)$id;

			// Delete from DB
			$prepare = $pdo->prepare('DELETE FROM expenses WHERE id = :id');
			$prepare->bindValue('id',$id);
			$prepare->execute();
		}

		public function add($data)
		{
			global $pdo;

			$errors  = array();
			$success = array();

			// Get data
			$name        = strip_tags(trim($data['name']));
			$expenser    = strip_tags(trim($data['expenser']));
			$amount      = (float)$data['amount'];
			$id_category = (int)$data['id_category'];

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
				$prepare->execute();

				$success[] = 'Dépense sauvegardée';
			}

			$result          = new stdClass();
			$result->errors  = $errors;
			$result->success = $success;

			return $result;
		}
	}