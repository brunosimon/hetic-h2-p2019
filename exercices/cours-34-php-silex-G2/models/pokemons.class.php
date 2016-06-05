<?php

class PokemonsModel
{
	public $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$query = $this->db->query('
			SELECT
				*
			FROM
				pokemons
		');

		$pokemons = $query->fetchAll();

		return $pokemons;
	}
}