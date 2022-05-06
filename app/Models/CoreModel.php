<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models
abstract class CoreModel
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;


    // tous les enfants de la classe CoreModel devront déclarer une fonction avec la même signature ( = même nom + même visibilité + même paramètres + le static aussi )
    abstract public static function find(int $id);
    abstract public static function findAll();

    abstract public function insert();
    abstract public function update();
    abstract public static function delete($id);

    /**
     * cette fonction met à jour si c'est un objet existant
     * et insère si c'est un nouvel objet
     *
     * @return void
     */
    public function save() {

        // si id est null alors insertion
        if (is_null($this->id))
        {
            $this->insert(); 
        }
        // si on trouve un objet => update
        else 
        {
            $this->update();
        }
    }

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
