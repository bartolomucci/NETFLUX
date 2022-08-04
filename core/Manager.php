<?php

namespace Core;

class Manager
{
    protected static $pdo = NULL;

    public function getPdo()
    {
        if(self::$pdo === null)
        {
            self::$pdo = new \PDO('mysql:host=localhost;dbname=netflux_db', 'netfluxien', 'azerty', [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]);
        }

        return self::$pdo;
    }

    public function getTableName()
    {
        return strtolower(str_replace(
            [
                'App\\Manager\\',
                'Manager'
            ], 
            [
                '',
                ''
            ], get_called_class())
        );
    }

    public function getEntityClassName()
    {
        return '\\App\\Entity\\' . ucfirst($this->getTableName());
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->getTableName();
        $query = $this->getPdo()->query($sql);
        return EntityCollection::createFromQueryResult($query->fetchAll(), $this->getEntityClassName())->toArray();
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE id = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);

        $className = $this->getEntityClassName();
        return new $className($query->fetch());
    }
  
}