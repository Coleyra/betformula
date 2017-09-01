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
     * @var string
     *
     * @ORM\Column(name="FOR_LIBELLE", type="string", length=256, nullable=false)
     */
    private $forLibelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="FOR_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $forId;


}

