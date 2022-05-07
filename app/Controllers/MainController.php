<?php

namespace App\Controllers;

use App\Models\AppUser;

class MainController extends CoreController{

    public function home()
    {
        //affiche la page home
        $this->show("main/home");
    }

    public function logout() 
    {
        // on déconnecte l'utilisateur = on supprime ses infos de la session
        unset($_SESSION['userId']);
        unset($_SESSION['userObject']);

        // on redirige vers la page de login
        $this->redirect('login-show');
        exit;
    }
}