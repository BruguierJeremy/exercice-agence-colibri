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

    public function insert()
    {

        $pdo = Database::getPDO();
        
        $sql = "  
                INSERT INTO `app_user` (
                email, 
                password, 
                firstname, 
                lastname,
            )
            VALUES (:email, :password, :firstname, :lastname);
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue('email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue('password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue('firstname', $this->firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue('lastname', $this->lastname, PDO::PARAM_STR);

        $isInserted = $pdoStatement->execute();

        if ($isInserted) {

            $this->id = $pdo->lastInsertId();

            return true;
        }

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