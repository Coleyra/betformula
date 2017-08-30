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
     * @var integer
     *
     * @ORM\Column(name="USR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usrId;

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
     * Set usrPseudo
     *
     * @param string $usrPseudo
     *
     * @return User
     */
    public function setUsrPseudo($usrPseudo)
    {
        $this->usrPseudo = $usrPseudo;

        return $this;
    }

    /**
     * Get usrPseudo
     *
     * @return string
     */
    public function getUsrPseudo()
    {
        return $this->usrPseudo;
    }

    /**
     * Set usrPwd
     *
     * @param string $usrPwd
     *
     * @return User
     */
    public function setUsrPwd($usrPwd)
    {
        $this->usrPwd = $usrPwd;

        return $this;
    }

    /**
     * Get usrPwd
     *
     * @return string
     */
    public function getUsrPwd()
    {
        return $this->usrPwd;
    }

    /**
     * Set usrEmail
     *
     * @param string $usrEmail
     *
     * @return User
     */
    public function setUsrEmail($usrEmail)
    {
        $this->usrEmail = $usrEmail;

        return $this;
    }

    /**
     * Get usrEmail
     *
     * @return string
     */
    public function getUsrEmail()
    {
        return $this->usrEmail;
    }

    /**
     * Set usrNbPoint
     *
     * @param integer $usrNbPoint
     *
     * @return User
     */
    public function setUsrNbPoint($usrNbPoint)
    {
        $this->usrNbPoint = $usrNbPoint;

        return $this;
    }

    /**
     * Get usrNbPoint
     *
     * @return integer
     */
    public function getUsrNbPoint()
    {
        return $this->usrNbPoint;
    }

    /**
     * Get usrId
     *
     * @return integer
     */
    public function getUsrId()
    {
        return $this->usrId;
    }
}
