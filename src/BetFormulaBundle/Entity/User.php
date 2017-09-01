<?php

namespace BetFormulaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="USR_PSEUDO", type="string", length=128, nullable=false)
     */
    private $usrPseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_PWD", type="string", length=128, nullable=false)
     */
    private $usrPwd;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_EMAIL", type="string", length=128, nullable=false)
     */
    private $usrEmail;

    /**
     * @var integer
     *
     * @ORM\Column(name="USR_NB_POINT", type="integer", nullable=false)
     */
    private $usrNbPoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="USR_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usrId;


}

