<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pronostic
 *
 * @ORM\Table(name="pronostic", indexes={@ORM\Index(name="FK_USR_ID", columns={"FK_USR_ID"}), @ORM\Index(name="FK_GP_ID", columns={"FK_GP_ID"}), @ORM\Index(name="FK_PIL_ID", columns={"FK_PIL_ID"})})
 * @ORM\Entity
 */
class Pronostic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PRN_POSITION", type="integer", nullable=false)
     */
    private $prnPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRN_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prnId;

    /**
     * @var \BetFormulaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_USR_ID", referencedColumnName="USR_ID")
     * })
     */
    private $fkUsr;

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

    public function getPrnPosition() {
        return $this->prnPosition;
    }

    public function getPrnId() {
        return $this->prnId;
    }

    public function getFkUsr() {
        return $this->fkUsr;
    }

    public function getFkPil() {
        return $this->fkPil;
    }

    public function getFkGp() {
        return $this->fkGp;
    }

    public function setPrnPosition($prnPosition) {
        $this->prnPosition = $prnPosition;
        return $this;
    }

    public function setPrnId($prnId) {
        $this->prnId = $prnId;
        return $this;
    }

    public function setFkUsr(\BetFormulaBundle\Entity\User $fkUsr) {
        $this->fkUsr = $fkUsr;
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


}

