<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instruction
 *
 * @ORM\Table(name="instruction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InstructionRepository")
 */
class Instruction
{
    /**
     * @var int
     *
     * @ORM\Column(name="idInstruction", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idInstruction;

    /**
     * @var string
     *
     * @ORM\Column(name="nomInstruction", type="string", length=255, unique=true)
     */
    private $nomInstruction;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * Get id
     *
     * @return int
     */
    public function getIdInstruction()
    {
        return $this->idInstruction;
    }

    /**
     * Set nomInstruction
     *
     * @param string $nomInstruction
     *
     * @return Instruction
     */
    public function setNomInstruction($nomInstruction)
    {
        $this->nomInstruction = $nomInstruction;

        return $this;
    }

    /**
     * Get nomInstruction
     *
     * @return string
     */
    public function getNomInstruction()
    {
        return $this->nomInstruction;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Instruction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

