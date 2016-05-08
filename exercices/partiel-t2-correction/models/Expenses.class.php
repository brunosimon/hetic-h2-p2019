<?php

class Expenses
{
	public function getAll()
	{
		global $pdo;

		$query = $pdo->query('
			SELECT
			    e.*,
			    c.name AS category_name
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

		$id = (int)$_GET['id'];

		$prepare = $pdo->prepare('DELETE FROM expenses WHERE id = :id');
		$prepare->bindValue('id',$id);
		$prepare->execute();
	}

	public function add($data)
	{
		global $pdo;

		// Set up
		$errors  = array();
		$success = array();

		// Retrieve values
		$expenser    = trim(strip_tags($data['expenser']));
		$name        = trim(strip_tags($data['name']));
		$id_category = (int)$data['id_category'];
		$price       = trim(strip_tags($data['price']));

		// Handle errors
		if($name == '')
			$errors['name'] = 'Le nom ne doit pas être vide';

		if($price == '')
			$errors['price'] = 'Le prix ne doit pas être vide';
		else if($price < 0)
			$errors['price'] = 'Le prix ne peut être négatif';
		else if($price == 0)
			$errors['price'] = 'Le prix ne peut être nul';

		// No error
		if(empty($errors))
		{
			// Send to DB
			$prepare = $pdo->prepare('INSERT INTO expenses (id_category,expenser,name,price) VALUES (:id_category,:expenser,:name,:price)');
			$prepare->bindValue('id_category',$id_category);
			$prepare->bindValue('expenser',$expenser);
			$prepare->bindValue('name',$name);
			$prepare->bindValue('price',$price);
			$execute = $prepare->execute();

			if(!$execute)
			{
				$errors['general'] = 'Une erreur s\'est produite';
			}
			else
			{
				$success['general'] = 'Dépense ajoutée';
			}
		}

		$result = new stdClass();
		$result->errors  = $errors;
		$result->success = $success;

		return $result;
	}
}