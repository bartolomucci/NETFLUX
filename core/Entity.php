<?php

namespace Core;

class Entity
{
    private ?int $id = null;

    public function __construct(array $data = [])	
    {
        if(!empty($data))
        {
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data)
    {
        $this->id = intval($data['id']);
        foreach ($data as $key => $value) {
            $method = $this->getSetMethod($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        
    }

    /**
     * Transform 
     * @param string $key
     * 
     * @return [type]
     */
    public function getSetMethod(string $key)
    {
        // On recupère chaque mot sep&éparé par un _
        $key = explode('_', $key);

        // On met la première lettre de chaque mot en majuscule
        foreach ($key as $k => $v) {
            $key[$k] = ucfirst($v);
        }

        // On reconstruit la clé en méthode : created_at => setCreatedAt()
        $key = implode('', $key);

        // On retourne la méthode
        return 'set' . $key;
    }

    public function getId()
    {
        return $this->id;
    }
}