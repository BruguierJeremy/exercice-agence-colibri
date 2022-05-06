<?php

namespace App\Controllers;

use App\Models\AppUser;

class UserController extends CoreController
{
    public function add()
    {
        $emptyUser = new AppUser;
        $this->show('/inscription', [
            'errorList' => [],
            'user' => $emptyUser,
        ]);
    }

    public function addPost()
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');

        $formErrorList = [];
        if (empty($firstname))
        {
            $formErrorList[] = 'Le prénom ne doit pas être vide';
        }
        if (empty($lastname))
        {
            $formErrorList[] = 'Le nom ne doit pas être vide';
        }
        if (empty($email))
        {
            $formErrorList[] = 'L\'email ne doit pas être vide';
        }
        if (empty($password))
        {
            $formErrorList[] = 'Le password est incorrect';
        }
        if (count($formErrorList) === 0) {
            $user = new AppUser();

            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);

            $user->insert();
        
            $this->redirect('main-home');
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
            $this->show('AppUser/add', [
                'user' => $user,
                'errorList' => $formErrorList,
            ]);
        }
    }
}