<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecurie
 *
 * @ORM\Table(name="ecurie", indexes={@ORM\Index(name="FK_FOR_ID", columns={"FK_FOR_ID"})})
 * @ORM\Entity
 */
class Ecurie
{
    /**
     * @var string
     *
     * @ORM\Column(name="ECU_LIBELLE", type="string", length=256, nullable=false)
     */
    private $ecuLibelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="ECU_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ecuId;

    /**
     * @var \BetFormulaBundle\Entity\Formule
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\Formule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_FOR_ID", referencedColumnName="FOR_ID")
     * })
     */
    private $fkFor;

    /**
     * @var string
     *
     * @ORM\Column(name="API_CONSTRUCTOR_ID", type="string")
     */
    private $apiConstructorId;

    public function getEcuLibelle() {
        return $this->ecuLibelle;
    }

    public function getEcuId() {
        return $this->ecuId;
    }

    public function getFkFor() {
        return $this->fkFor;
    }

    public function setEcuLibelle($ecuLibelle) {
        $this->ecuLibelle = $ecuLibelle;
        return $this;
    }

    public function setEcuId($ecuId) {
        $this->ecuId = $ecuId;
        return $this;
    }

    public function setFkFor(\BetFormulaBundle\Entity\Formule $fkFor) {
        $this->fkFor = $fkFor;
        return $this;
    }

    public function getApiConstructorId() {
        return $this->apiConstructorId;
    }

    public function setApiConstructorId($apiConstructorId) {
        $this->apiConstructorId = $apiConstructorId;
        return $this;
    }


}

