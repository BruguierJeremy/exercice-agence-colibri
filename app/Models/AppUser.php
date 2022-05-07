<?php 

namespace App\Models;
use App\Utils\Database;
use PDO;


class AppUser extends CoreModel
{
    private $email;
    private $password;
    private $firstname;
    private $lastname;


    public static function findByEmail(string $email)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM `app_user` WHERE `email` = :email';

        // préparer notre requête
        $pdoStatement = $pdo->prepare($sql);

        // remplir les emplacements
        $pdoStatement->bindValue('email', $email, PDO::PARAM_STR);

        $pdoStatement->execute();

        // un seul résultat => fetchObject
        $user = $pdoStatement->fetchObject(self::class);

        // retourner le résultat
        return $user;
    }

    public function insert()
    {
        // Récupération de l'objet PDO représentant la connexion à la DB
        $pdo = Database::getPDO();

        // Ecriture de la requête INSERT INTO
        $sql = "  
                INSERT INTO `app_user` (
                email, 
                password, 
                firstname, 
                lastname
            )
            VALUES (:email, :password, :firstname, :lastname);
        ";

        // préparation de la requête ( au niveau de PDO )
        $pdoStatement = $pdo->prepare($sql);

        // remplissage des emplacements 
        $pdoStatement->bindValue('email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue('password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue('firstname', $this->firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue('lastname', $this->lastname, PDO::PARAM_STR);

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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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
}