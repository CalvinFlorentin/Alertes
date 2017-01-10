<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonneMorale
 *
 * @ORM\Table(name="personne_morale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonneMoraleRepository")
 */
class PersonneMorale
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPersMorale", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPersMorale;

    /**
     * @var string
     *
     * @ORM\Column(name="nomOrganisation", type="string", length=255)
     */
    private $nomOrganisme;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="organisme")
     */
    private $contacts;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdPersMorale()
    {
        return $this->idPersMorale;
    }

    /**
     * Set nomOrganisation

     * @param string $nomOrganisme

     * @return PersonneMorale
     */
    public function setNomOrganisme($nomOrganisme) {
        $this->nomOrganisme = $nomOrganisme;

        return $this;
    }

    /**
     * Get nomOrganisation
     *
     * @return string
     */
    public function getNomOrganisme()
    {
        return $this->nomOrganisme;
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
