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
     * @var integer
     *
     * @ORM\Column(name="ECU_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ecuId;

    /**
     * @var string
     *
     * @ORM\Column(name="ECU_LIBELLE", type="string", length=256, nullable=false)
     */
    private $ecuLibelle;

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
     * Set ecuLibelle
     *
     * @param string $ecuLibelle
     *
     * @return Ecurie
     */
    public function setEcuLibelle($ecuLibelle)
    {
        $this->ecuLibelle = $ecuLibelle;

        return $this;
    }

    /**
     * Get ecuLibelle
     *
     * @return string
     */
    public function getEcuLibelle()
    {
        return $this->ecuLibelle;
    }

    /**
     * Get ecuId
     *
     * @return integer
     */
    public function getEcuId()
    {
        return $this->ecuId;
    }

    /**
     * Set fkFor
     *
     * @param \BetFormulaBundle\Entity\Formule $fkFor
     *
     * @return Ecurie
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
}
