<?php

namespace App\Controllers;

use App\Models\AppUser;



class LoginController extends CoreController
{
    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function showLogin()
    {   
        $this->show('user/login');
    }

    
    public function postLogin()
    {
        // récupération des données
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        // on ne nettoie pas le mot de passe sinon mon<password> est nettoyé en mon
        $password = filter_input(INPUT_POST, 'password');

        // validation des données
        $errorList = [];

        if ($email === false)
        {
            $errorList[] = 'L identifiant est votre email';
        }

        // si validation ok alors traitement des données
        if (empty($errorList))
        {
                    // récupérer un utilisateur dont l'identifiant est fournit
            $user = AppUser::findByEmail($email);

            if ($user === false)
            {
                // l'email n'est pas bon => on rajoute une erreur
                echo 'l email n est pas trouvé en BDD';
                $errorList[] = 'l email n est pas trouvé en BDD';
            }
            else 
            {
                // vérifier que le mot de passe fournit correspond au mot de passe en BDD
                        
                if (password_verify($password, $user->getPassword()))
                {
                    echo 'AUTHENTIFICATION réussie';

                    // connexion de l'utilisateur
                    // c'est à dire que on l'enregistre dans la session
                    // on peut car la session a été démarrée avec session_start() dans inde
                    $_SESSION['userId'] = $user->getId();
                    $_SESSION['userObject'] = $user;
                    $this->redirect('main-home');
                }
                else
                {
                    echo 'Mot de passe erroné';
                }
            }
                }

        
    }
}
