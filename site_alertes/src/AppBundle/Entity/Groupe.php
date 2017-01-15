<?php

    namespace AppBundle\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Groupe
     * @ORM\Table(name="groupes")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupeRepository")
     */
    class Groupe {
        /**
         * @var int
         * @ORM\Column(name="idGroupe", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $idGroupe;

        /**
         * @var string
         * @ORM\Column(name="nomGroupe", type="string", length=255, unique=true)
         */
        private $nomGroupe;

        /**
         * @var ArrayCollection
         * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Contact", cascade={"persist"})
         * @ORM\JoinTable(name="groupes_contacts",
         *      joinColumns={@ORM\JoinColumn(name="idGroupe", referencedColumnName="idGroupe")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="idContact", referencedColumnName="idContact")}
         * )
         */
        private $contacts;

        /**
         * Groupe constructor.
         */
        public function __construct() {
            $this->contacts = new ArrayCollection();
        }


        /**
         * Get id
         * @return int
         */
        public function getIdGroupe() {
            return $this->idGroupe;
        }

        /**
         * Set nomGroupe
         * @param string $nomGroupe
         * @return Groupe
         */
        public function setNomGroupe($nomGroupe) {
            $this->nomGroupe = $nomGroupe;
            return $this;
        }

        /**
         * Get nomGroupe
         * @return string
         */
        public function getNomGroupe() {
            return $this->nomGroupe;
        }

        /**
         * Ajout du contact en paramètre à la liste des contacts this
         * @param Contact $contact
         */
        public function addContact(Contact $contact) {
            $this->contacts[] = $contact;
        }

        /**
         * Suppression du contact en paramètre de la liste de contact this
         * @param Contact $contact
         */
        public function removeContact(Contact $contact) {
            $this->contacts->removeElement($contact);
        }

        /**
         * Retourne la liste de contacts
         * @return ArrayCollection
         */
        public function getContacts() {
            return $this->contacts;
        }
    }

