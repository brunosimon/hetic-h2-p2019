<?php

class TypesModel
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
				types
		');
		$types = $query->fetchAll();
		
		return $types;
    }

    public function getAllForPokemonId($id)
    {
    	$id = (int)$id;

    	$prepare = $this->db->prepare('
    		SELECT
    			t.*
			FROM
				pokemons_types AS pt
            LEFT JOIN
                types AS t
            ON
                t.id = pt.id_type
			WHERE
				pt.id_pokemon = :id
		');
		$prepare->bindValue('id',$id);
		$prepare->execute();
		$types = $prepare->fetchAll();

		return $types;
    }
}