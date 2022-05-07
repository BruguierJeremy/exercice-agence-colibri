<?php 

namespace App\Models;
use App\Utils\Database;
use PDO;


class ContactModel extends CoreModel
{
    private $email;
    private $firstname;
    private $lastname;
    private $subject;
    private $message;

    public function insert()
    {
        // Récupération de l'objet PDO représentant la connexion à la DB
        $pdo = Database::getPDO();

        // Ecriture de la requête INSERT INTO
        $sql = "  
                INSERT INTO `contact` (
                email,  
                firstname, 
                lastname,
                subject,
                message
            )
            VALUES (:email, :firstname, :lastname, :subject, :message);
        ";

        // préparation de la requête ( au niveau de PDO )
        $pdoStatement = $pdo->prepare($sql);

        // remplissage des emplacements 
        $pdoStatement->bindValue('email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue('firstname', $this->firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue('lastname', $this->lastname, PDO::PARAM_STR);
        $pdoStatement->bindValue('subject', $this->subject, PDO::PARAM_STR);
        $pdoStatement->bindValue('message', $this->message, PDO::PARAM_STR);

        // Execution de la requête d'insertion (exec, pas query)
        $isInserted = $pdoStatement->execute();

        // Si au moins une ligne ajoutée
        if ($isInserted) {
            // Alors on récupère l'id auto-incrémenté généré par MySQL
            $this->id = $pdo->lastInsertId();
            // On retourne VRAI car l'ajout a parfaitement fonctionné
            return true;
        }
        // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné 
        return false;
    }

    public function update()
    {

    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}