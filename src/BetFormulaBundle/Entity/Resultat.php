<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultat
 *
 * @ORM\Table(name="resultat", indexes={@ORM\Index(name="FK_PIL_ID", columns={"FK_PIL_ID"}), @ORM\Index(name="FK_GP_ID", columns={"FK_GP_ID"})})
 * @ORM\Entity
 */
class Resultat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RES_POSITION", type="integer", nullable=false)
     */
    private $resPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="RES_POINT", type="integer", nullable=false)
     */
    private $resPoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="RES_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resId;

    /**
     * @var \BetFormulaBundle\Entity\Pilote
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\Pilote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_PIL_ID", referencedColumnName="PIL_ID")
     * })
     */
    private $fkPil;

    /**
     * @var \BetFormulaBundle\Entity\Gp
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\Gp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_GP_ID", referencedColumnName="GP_ID")
     * })
     */
    private $fkGp;

    public function getResPosition() {
        return $this->resPosition;
    }

    public function getResId() {
        return $this->resId;
    }

    public function getFkPil() {
        return $this->fkPil;
    }

    public function getFkGp() {
        return $this->fkGp;
    }

    public function setResPosition($resPosition) {
        $this->resPosition = $resPosition;
        return $this;
    }

    public function setResId($resId) {
        $this->resId = $resId;
        return $this;
    }

    public function setFkPil(\BetFormulaBundle\Entity\Pilote $fkPil) {
        $this->fkPil = $fkPil;
        return $this;
    }

    public function setFkGp(\BetFormulaBundle\Entity\Gp $fkGp) {
        $this->fkGp = $fkGp;
        return $this;
    }
    public function getResPoint() {
        return $this->resPoint;
    }

    public function setResPoint($resPoint) {
        $this->resPoint = $resPoint;
        return $this;
    }



}

