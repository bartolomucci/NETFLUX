<?php

namespace App\Controller;

use Core\AbstractController;
use App\Manager\MovieManager;

class HomeController extends AbstractController
{
    /**
     * Affichage de tous les films
     *
     * @return void
     */
    public function index()
    {
        $manager = new MovieManager();
        $movies = $manager->getAll();

        return $this->render('home/index.html.twig', compact('movies'));
    }
}
