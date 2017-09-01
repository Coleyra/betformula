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
     * @ORM\Column(name="PRN_POSITION", type="integer", nullable=false)
     */
    private $prnPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRN_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prnId;

    /**
     * @var \BetFormulaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_USR_ID", referencedColumnName="USR_ID")
     * })
     */
    private $fkUsr;

    /**
     * @var \BetFormulaBundle\Entity\Pilote
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\Pilote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_PIL_ID", referencedColumnName="PIL_ID")
     * })
     */
    private $fkPil;

    /**
     * @var \BetFormulaBundle\Entity\Gp
     *
     * @ORM\ManyToOne(targetEntity="BetFormulaBundle\Entity\Gp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_GP_ID", referencedColumnName="GP_ID")
     * })
     */
    private $fkGp;


}

