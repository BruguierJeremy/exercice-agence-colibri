<?php

namespace App\Controllers;

class CoreController 
{
    protected $router;
    /**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewData Tableau des données à transmettre aux vues
     * @return void
     */

    public function __construct($router, $match) 
    {
        $this->router = $router;
    }

    protected function show( string $viewName, $viewData = [])
    {
        $router = $this->router;
        // Comme $viewData est déclarée comme paramètre de la méthode show()
        // les vues y ont accès
        // ici une valeur dont on a besoin sur TOUTES les vues
        // donc on la définit dans show()
        $viewData['currentPage'] = $viewName;

        // définir l'url absolue pour nos assets
        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';

        // définir l'url absolue pour la racine du site
        $viewData['baseUri'] = $_SERVER['BASE_URI'];

        // La fonction extract permet de créer une variable pour chaque élément du tableau passé en argument
        extract($viewData);

        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/partials/_header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/partials/_footer.tpl.php';
    }
    public function redirect($route)
    {
        global $router;
        header('Location: ' . $router->generate($route));
        exit;
    }
}