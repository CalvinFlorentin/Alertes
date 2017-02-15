<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Protocole
 *
 * @ORM\Table(name="protocole")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProtocoleRepository")
 */
class Protocole
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProtocole", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idProtocole;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProtocole", type="string", length=255, unique=true)
     */
    private $nomProtocole;



    /**
     * Get id
     *
     * @return int
     */
    public function getIdProtocole()
    {
        return $this->idProtocole;
    }

    /**
     * Set nomProtocole
     *
     * @param string $nomProtocole
     *
     * @return Protocole
     */
    public function setNomProtocole($nomProtocole)
    {
        $this->nomProtocole = $nomProtocole;

        return $this;
    }

    /**
     * Get nomProtocole
     *
     * @return string
     */
    public function getNomProtocole()
    {
        return $this->nomProtocole;
    }
}

