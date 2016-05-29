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

    public function getOneById($id)
    {
    	$id = (int)$id;

    	$prepare = $this->db->prepare('
    		SELECT
    			*
			FROM
				pokemons
			WHERE
				id = :id
		');
		$prepare->bindValue('id',$id);
		$prepare->execute();
		$pokemon = $prepare->fetch();
		
		return $pokemon;
    }
}