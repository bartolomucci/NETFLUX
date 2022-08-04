<?php

namespace App\Entity;

use Core\Entity;

class Movie extends Entity{

    private string $title;

    private string $genre;

    private string $cover;

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGenre($gender)
    {
        $this->genre = $gender;

        return $this;
    }

    /**
     * Get the value of cover
     */ 
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set the value of cover
     *
     * @return  self
     */ 
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }
}