<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProtocoleInstruction
 *
 * @ORM\Table(name="protocole_instruction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProtocoleInstructionRepository")
 */
class ProtocoleInstruction
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProtocoleInstruction", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idProtocoleInstruction;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var bool
     *
     * @ORM\Column(name="validationInstruction", type="boolean")
     */
    private $validationInstruction;

    /**
     * @var Protocole
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Protocole", cascade={"persist"})
     * @ORM\JoinColumn(name="protocole", referencedColumnName="idProtocole", nullable=false)
     */
    private $protocole;

    /**
     * @var Instruction
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Instruction", cascade={"persist"})
     * @ORM\JoinColumn(name="instruction", referencedColumnName="idInstruction", nullable=false)
     */
    private $instruction;

    /**
     * ProtocoleInstruction constructor.
     * @param int         $position
     * @param bool        $validationInstruction
     * @param Instruction $instruction
     */
    public function __construct() {
        $this->position = new ArrayCollection();
        $this->validationInstruction = new ArrayCollection();
        $this->instruction = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getIdProtocoleInstruction()
    {
        return $this->idProtocoleInstruction;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return ProtocoleInstruction
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set validationInstruction
     *
     * @param boolean $validationInstruction
     *
     * @return ProtocoleInstruction
     */
    public function setValidationInstruction($validationInstruction)
    {
        $this->validationInstruction = $validationInstruction;

        return $this;
    }

    /**
     * Get validationInstruction
     *
     * @return bool
     */
    public function getValidationInstruction()
    {
        return $this->validationInstruction;
    }

    /**
     * @return Protocole
     */
    public function getProtocole() {
        return $this->protocole;
    }

    /**
     * @param Protocole $protocole
     */
    public function setProtocole(Protocole $protocole) {
        $this->protocole = $protocole;
    }

    /**
     * @return ArrayCollection
     */
    public function getInstruction() {
        return $this->instruction;
    }

    /**
     * @param Instruction $instruction
     */
    public function addInstruction(Instruction $instruction) {
        $this->instruction[] = $instruction;
    }

}

