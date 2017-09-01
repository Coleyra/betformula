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
     * @ORM\Column(name="SAI_CODE", type="integer", nullable=false)
     */
    private $saiCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="SAI_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $saiId;


}

