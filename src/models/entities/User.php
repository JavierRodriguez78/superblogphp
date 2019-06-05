<?php

namespace App\models\entities;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *  message="Debes rellenar el nombre"
     * )
     * @Assert\Length(
     *  min="2",
     *  minMessage="Mínimo 2 caracteres"
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *  message="Debes un introducir un email"
     * )
     * @Assert\Email(
     *  message="Debes introducir un email válido"
     * )
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *  message="Debes un introducir el password"
     * )
     * @Assert\Length(
     *  min="6"
     *  message="Debes introducir 6 carácteres mínimos"
     * )
     */
    protected $password;


    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime") 
     */
    protected $updated_at;

    public function __construct()
    {
        $this->created_at= new \DateTime('now');
    }

}