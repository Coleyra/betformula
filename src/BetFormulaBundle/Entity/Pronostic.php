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
     * @ORM\Column(name="PRN_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prnId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRN_POSITION", type="integer", nullable=false)
     */
    private $prnPosition;

    /**
     * @var \Gp
     *
     * @ORM\ManyToOne(targetEntity="Gp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_GP_ID", referencedColumnName="GP_ID")
     * })
     */
    private $fkGp;

    /**
     * @var \Pilote
     *
     * @ORM\ManyToOne(targetEntity="Pilote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_PIL_ID", referencedColumnName="PIL_ID")
     * })
     */
    private $fkPil;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_USR_ID", referencedColumnName="USR_ID")
     * })
     */
    private $fkUsr;



    /**
     * Set prnPosition
     *
     * @param integer $prnPosition
     *
     * @return Pronostic
     */
    public function setPrnPosition($prnPosition)
    {
        $this->prnPosition = $prnPosition;

        return $this;
    }

    /**
     * Get prnPosition
     *
     * @return integer
     */
    public function getPrnPosition()
    {
        return $this->prnPosition;
    }

    /**
     * Get prnId
     *
     * @return integer
     */
    public function getPrnId()
    {
        return $this->prnId;
    }

    /**
     * Set fkGp
     *
     * @param \BetFormulaBundle\Entity\Gp $fkGp
     *
     * @return Pronostic
     */
    public function setFkGp(\BetFormulaBundle\Entity\Gp $fkGp = null)
    {
        $this->fkGp = $fkGp;

        return $this;
    }

    /**
     * Get fkGp
     *
     * @return \BetFormulaBundle\Entity\Gp
     */
    public function getFkGp()
    {
        return $this->fkGp;
    }

    /**
     * Set fkPil
     *
     * @param \BetFormulaBundle\Entity\Pilote $fkPil
     *
     * @return Pronostic
     */
    public function setFkPil(\BetFormulaBundle\Entity\Pilote $fkPil = null)
    {
        $this->fkPil = $fkPil;

        return $this;
    }

    /**
     * Get fkPil
     *
     * @return \BetFormulaBundle\Entity\Pilote
     */
    public function getFkPil()
    {
        return $this->fkPil;
    }

    /**
     * Set fkUsr
     *
     * @param \BetFormulaBundle\Entity\User $fkUsr
     *
     * @return Pronostic
     */
    public function setFkUsr(\BetFormulaBundle\Entity\User $fkUsr = null)
    {
        $this->fkUsr = $fkUsr;

        return $this;
    }

    /**
     * Get fkUsr
     *
     * @return \BetFormulaBundle\Entity\User
     */
    public function getFkUsr()
    {
        return $this->fkUsr;
    }
}
