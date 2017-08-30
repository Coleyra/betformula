<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pilote
 *
 * @ORM\Table(name="pilote")
 * @ORM\Entity
 */
class Pilote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PIL_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pilId;

    /**
     * @var string
     *
     * @ORM\Column(name="PIL_NOM", type="string", length=256, nullable=false)
     */
    private $pilNom;

    /**
     * @var string
     *
     * @ORM\Column(name="PIL_PRENOM", type="string", length=256, nullable=false)
     */
    private $pilPrenom;



    /**
     * Set pilNom
     *
     * @param string $pilNom
     *
     * @return Pilote
     */
    public function setPilNom($pilNom)
    {
        $this->pilNom = $pilNom;

        return $this;
    }

    /**
     * Get pilNom
     *
     * @return string
     */
    public function getPilNom()
    {
        return $this->pilNom;
    }

    /**
     * Set pilPrenom
     *
     * @param string $pilPrenom
     *
     * @return Pilote
     */
    public function setPilPrenom($pilPrenom)
    {
        $this->pilPrenom = $pilPrenom;

        return $this;
    }

    /**
     * Get pilPrenom
     *
     * @return string
     */
    public function getPilPrenom()
    {
        return $this->pilPrenom;
    }

    /**
     * Get pilId
     *
     * @return integer
     */
    public function getPilId()
    {
        return $this->pilId;
    }
}
