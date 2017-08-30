<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity
 */
class Saison
{
    /**
     * @var integer
     *
     * @ORM\Column(name="SAI_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $saiId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SAI_CODE", type="integer", nullable=false)
     */
    private $saiCode;



    /**
     * Set saiCode
     *
     * @param integer $saiCode
     *
     * @return Saison
     */
    public function setSaiCode($saiCode)
    {
        $this->saiCode = $saiCode;

        return $this;
    }

    /**
     * Get saiCode
     *
     * @return integer
     */
    public function getSaiCode()
    {
        return $this->saiCode;
    }

    /**
     * Get saiId
     *
     * @return integer
     */
    public function getSaiId()
    {
        return $this->saiId;
    }
}
