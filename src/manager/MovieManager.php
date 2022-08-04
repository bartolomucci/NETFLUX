<?php

namespace App\Manager;

use Core\Manager;
use Core\EntityCollection;


class MovieManager extends Manager
{

    /**
     * Permet de récupérer tous les films en fonction d'une recherche textuelle
     * sur le titre ou le genre (ou les deux)
     *
     * @param  mixed $search
     * @return void
     */
    public function findBySearch($search)
    {
        $sql = "SELECT * FROM movie WHERE title LIKE :search"; // TODO
        $query = Manager::getPdo()->prepare($sql);
        $query->execute(['search' => '%' . $search . '%']);
        return EntityCollection::createFromQueryResult($query->fetchAll(), $this->getEntityClassName())->toArray();
    }
}
