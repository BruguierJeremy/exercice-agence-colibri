<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends CoreController
{
    public function add()
    {
        $this->show('main/contact');
    }

    public function addPost()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $subject = filter_input(INPUT_POST, 'subject');
        $message = filter_input(INPUT_POST, 'message');

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
        if (empty($subject))
        {
            $formErrorList[] = 'Le sujet ne doit pas être vide';
        }
        if (empty($message))
        {
            $formErrorList[] = 'Le message ne doit pas être vide';
        }
        if (count($formErrorList) === 0) {
            $newContact = new ContactModel();

            $newContact->setFirstname($firstname);
            $newContact->setLastname($lastname);
            $newContact->setEmail($email);
            $newContact->setSubject($subject);
            $newContact->setMessage($message);
            $newContact->insert();
        
            $this->redirect('main-home');
            exit;
        } 
        else 
        {
            // créons un nouvel objet qui va contenir les données saisies par l'utilisateur 
            $contact = new ContactModel;
            $contact->setFirstname($_POST['firstname']);
            $contact->setLastname($_POST['lastname']);
            $contact->setEmail($_POST['email']);
            $contact->setSubject($_POST['subject']);
            $contact->setMessage($_POST['message']);
            // et on s'en servira pour afficher les données dans le formulaire de création
            $this->show('main/contact', [
                'contact' => $contact,
                'errorList' => $formErrorList,
            ]);
        }
    }
}