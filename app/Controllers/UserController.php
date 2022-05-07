<?php

namespace App\Controllers;

use App\Models\AppUser;

class UserController extends CoreController
{
    public function add()
    {
        $this->show('user/inscription');
    }

    public function addPost()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');

        $formErrorList = [];
        if (empty($email))
        {
            $formErrorList[] = 'L\'email ne doit pas être vide';
        }
        if (empty($lastname))
        {
            $formErrorList[] = 'Le nom ne doit pas être vide';
        }
        if (empty($firstname))
        {
            $formErrorList[] = 'Le prénom ne doit pas être vide';
        }
        if (empty($password))
        {
            $formErrorList[] = 'Le password est incorrect';
        }
        if (count($formErrorList) === 0) {
            $newUser = new AppUser();

            $newUser->setFirstname($firstname);
            $newUser->setLastname($lastname);
            $newUser->setEmail($email);
            $newUser->setPassword(password_hash($password, PASSWORD_DEFAULT));
            $newUser->insert();
        
            $this->redirect('login-show');
            exit;
        } 
        else 
        {
            // créons un nouvel objet qui va contenir les données saisies par l'utilisateur 
            $user = new AppUser;
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            // et on s'en servira pour afficher les données dans le formulaire de création
            $this->show('user/inscription', [
                'user' => $user,
                'errorList' => $formErrorList,
            ]);
        }
    }
}