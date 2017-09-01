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
     * @var integer
     *
     * @ORM\Column(name="PIL_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pilId;


}

