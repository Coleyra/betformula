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
     * @ORM\Column(name="RES_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RES_POSITION", type="integer", nullable=false)
     */
    private $resPosition;

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
     * Set resPosition
     *
     * @param integer $resPosition
     *
     * @return Resultat
     */
    public function setResPosition($resPosition)
    {
        $this->resPosition = $resPosition;

        return $this;
    }

    /**
     * Get resPosition
     *
     * @return integer
     */
    public function getResPosition()
    {
        return $this->resPosition;
    }

    /**
     * Get resId
     *
     * @return integer
     */
    public function getResId()
    {
        return $this->resId;
    }

    /**
     * Set fkGp
     *
     * @param \BetFormulaBundle\Entity\Gp $fkGp
     *
     * @return Resultat
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
     * @return Resultat
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
}
