<?php

namespace App\Controllers;

class MainController extends CoreController{

    public function home()
    {
        //affiche la page home
        $this->show("main/home");
    }
}