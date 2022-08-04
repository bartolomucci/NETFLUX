<?php
namespace Core;

use Core\Entity;

class EntityCollection
{
    private $collection = [];

    public static function createFromQueryResult(array $queryResult, string $className)
    {
        $collection = new static();
        foreach ($queryResult as $row) {
            $collection->add(new $className($row));
        }
        return $collection;
    }

    public function add(Entity $entity)
    {
        $this->collection[] = $entity;
    }

    public function toArray()
    {
        return $this->collection;
    }
}