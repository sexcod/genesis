<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 07/03/16
 * Time: 16:04
 */

namespace SexCode\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table("Cliente")
 */

class Cliente
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */

    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     *
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     *
     * @var string
     */

    private $login;

    /**
     * @ORM\Column(type="string", length=45)
     *
     * @var string
     */

    private $senha;

    /**
     * @ORM\Column(type="string", length=150, unique=true)
     *
     * @var string
     */

    private $email;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cliente
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return Cliente
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Cliente
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }




}