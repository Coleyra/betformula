<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaiEcuPil
 *
 * @ORM\Table(name="sai_ecu_pil", indexes={@ORM\Index(name="FK_SAI_ID", columns={"FK_SAI_ID"}), @ORM\Index(name="FK_ECU_ID", columns={"FK_ECU_ID"}), @ORM\Index(name="FK_PIL_ID", columns={"FK_PIL_ID"})})
 * @ORM\Entity
 */
class SaiEcuPil
{
    /**
     * @var \BetFormulaBundle\Entity\Saison
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="BetFormulaBundle\Entity\Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_SAI_ID", referencedColumnName="SAI_ID")
     * })
     */
    private $fkSai;

    /**
     * @var \BetFormulaBundle\Entity\Pilote
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="BetFormulaBundle\Entity\Pilote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_PIL_ID", referencedColumnName="PIL_ID")
     * })
     */
    private $fkPil;

    /**
     * @var \BetFormulaBundle\Entity\Ecurie
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="BetFormulaBundle\Entity\Ecurie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_ECU_ID", referencedColumnName="ECU_ID")
     * })
     */
    private $fkEcu;

    public function getFkSai() {
        return $this->fkSai;
    }

    public function getFkPil() {
        return $this->fkPil;
    }

    public function getFkEcu() {
        return $this->fkEcu;
    }

    public function setFkSai(\BetFormulaBundle\Entity\Saison $fkSai) {
        $this->fkSai = $fkSai;
        return $this;
    }

    public function setFkPil(\BetFormulaBundle\Entity\Pilote $fkPil) {
        $this->fkPil = $fkPil;
        return $this;
    }

    public function setFkEcu(\BetFormulaBundle\Entity\Ecurie $fkEcu) {
        $this->fkEcu = $fkEcu;
        return $this;
    }


}

