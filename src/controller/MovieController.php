<?php

namespace App\Controller;

use Core\View;
use Core\AbstractController;
use App\Manager\MovieManager;

class MovieController extends AbstractController
{
    /**
     * Affichage des détails d'un film
     *
     * @return void
     */

    public function index()
    {
        $manager = new MovieManager();

        if (!empty($_GET['search']) === true) {
            $movies = $manager->findBySearch($_GET['search']);
            $search = $_GET['search'];
            $count = count($movies);
            $this->render('movie/index.html.twig', compact('movies', 'search', 'count'));
        } else {
            header('Location: /?no_blank_allowed');
        }
    }

    public function show()
    {
        $manager = new MovieManager();
        $movie = $manager->getById($_GET['id']);

        $this->render('movie/show.html.twig', compact('movie'));
    }
}
