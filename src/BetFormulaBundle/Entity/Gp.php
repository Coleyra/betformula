<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gp
 *
 * @ORM\Table(name="gp", indexes={@ORM\Index(name="fk_saison_gp", columns={"FK_SAI_ID"}), @ORM\Index(name="fk_for_gp", columns={"FK_FOR_ID"})})
 * @ORM\Entity
 */
class Gp
{
    /**
     * @var string
     *
     * @ORM\Column(name="GP_LIBELLE", type="string", length=256, nullable=false)
     */
    private $gpLibelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="GP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gpId;

    /**
     * @var \BetFormulaBundle\Entity\Saison
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_SAI_ID", referencedColumnName="SAI_ID")
     * })
     */
    private $fkSai;

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
     * @var integer
     *
     * @ORM\Column(name="GP_ROUND", type="integer")
     */
    private $gpRound;

    public function getGpLibelle() {
        return $this->gpLibelle;
    }

    public function getGpId() {
        return $this->gpId;
    }

    public function getFkSai() {
        return $this->fkSai;
    }

    public function getFkFor() {
        return $this->fkFor;
    }

    public function setGpLibelle($gpLibelle) {
        $this->gpLibelle = $gpLibelle;
        return $this;
    }

    public function setGpId($gpId) {
        $this->gpId = $gpId;
        return $this;
    }

    public function setFkSai(\BetFormulaBundle\Entity\Saison $fkSai) {
        $this->fkSai = $fkSai;
        return $this;
    }

    public function setFkFor(\BetFormulaBundle\Entity\Formule $fkFor) {
        $this->fkFor = $fkFor;
        return $this;
    }

    public function getGpRound() {
        return $this->gpRound;
    }

    public function setGpRound($gpRound) {
        $this->gpRound = $gpRound;
        return $this;
    }
}

