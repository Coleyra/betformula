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
     * @var integer
     *
     * @ORM\Column(name="GP_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gpId;

    /**
     * @var string
     *
     * @ORM\Column(name="GP_LIBELLE", type="string", length=256, nullable=false)
     */
    private $gpLibelle;

    /**
     * @var \Formule
     *
     * @ORM\ManyToOne(targetEntity="Formule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_FOR_ID", referencedColumnName="FOR_ID")
     * })
     */
    private $fkFor;

    /**
     * @var \Saison
     *
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_SAI_ID", referencedColumnName="SAI_ID")
     * })
     */
    private $fkSai;



    /**
     * Set gpLibelle
     *
     * @param string $gpLibelle
     *
     * @return Gp
     */
    public function setGpLibelle($gpLibelle)
    {
        $this->gpLibelle = $gpLibelle;

        return $this;
    }

    /**
     * Get gpLibelle
     *
     * @return string
     */
    public function getGpLibelle()
    {
        return $this->gpLibelle;
    }

    /**
     * Get gpId
     *
     * @return integer
     */
    public function getGpId()
    {
        return $this->gpId;
    }

    /**
     * Set fkFor
     *
     * @param \BetFormulaBundle\Entity\Formule $fkFor
     *
     * @return Gp
     */
    public function setFkFor(\BetFormulaBundle\Entity\Formule $fkFor = null)
    {
        $this->fkFor = $fkFor;

        return $this;
    }

    /**
     * Get fkFor
     *
     * @return \BetFormulaBundle\Entity\Formule
     */
    public function getFkFor()
    {
        return $this->fkFor;
    }

    /**
     * Set fkSai
     *
     * @param \BetFormulaBundle\Entity\Saison $fkSai
     *
     * @return Gp
     */
    public function setFkSai(\BetFormulaBundle\Entity\Saison $fkSai = null)
    {
        $this->fkSai = $fkSai;

        return $this;
    }

    /**
     * Get fkSai
     *
     * @return \BetFormulaBundle\Entity\Saison
     */
    public function getFkSai()
    {
        return $this->fkSai;
    }
}
