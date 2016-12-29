<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonnePhysique
 *
 * @ORM\Table(name="personne_physique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonnePhysiqueRepository")
 */
class PersonnePhysique
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPersPhysique", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPersPhysique;

    /**
     * @var string
     *
     * @ORM\Column(name="nomPersonne", type="string", length=32)
     */
    private $nomPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomPersonne", type="integer", length=32)
     */
    private $prenomPersonne;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="personne")
     */
    private $contacts;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdPersPhysique()
    {
        return $this->idPersPhysique;
    }

    /**
     * Set nomPersonne
     *
     * @param string $nomPersonne
     *
     * @return PersonnePhysique
     */
    public function setNomPersonne($nomPersonne)
    {
        $this->nomPersonne = $nomPersonne;

        return $this;
    }

    /**
     * Get nomPersonne
     *
     * @return string
     */
    public function getNomPersonne()
    {
        return $this->nomPersonne;
    }

    /**
     * Set prenomPersonne
     *
     * @param string $prenomPersonne
     *
     * @return PersonnePhysique
     */
    public function setPrenomPersonne($prenomPersonne)
    {
        $this->prenomPersonne = $prenomPersonne;

        return $this;
    }

    /**
     * Get prenomPersonne
     *
     * @return string
     */
    public function getPrenomPersonne()
    {
        return $this->prenomPersonne;
    }

    /**
     * @return int
     */
    public function getContacts() {
        return $this->contacts;
    }

    /**
     * @param int $contacts
     */
    public function setContacts($contacts) {
        $this->contacts = $contacts;
    }


}
