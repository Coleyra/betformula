<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formule
 *
 * @ORM\Table(name="formule")
 * @ORM\Entity
 */
class Formule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FOR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $forId;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR_LIBELLE", type="string", length=256, nullable=false)
     */
    private $forLibelle;



    /**
     * Set forLibelle
     *
     * @param string $forLibelle
     *
     * @return Formule
     */
    public function setForLibelle($forLibelle)
    {
        $this->forLibelle = $forLibelle;

        return $this;
    }

    /**
     * Get forLibelle
     *
     * @return string
     */
    public function getForLibelle()
    {
        return $this->forLibelle;
    }

    /**
     * Get forId
     *
     * @return integer
     */
    public function getForId()
    {
        return $this->forId;
    }
}
