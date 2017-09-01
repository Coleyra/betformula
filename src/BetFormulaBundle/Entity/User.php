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

    public function getUsrPseudo() {
        return $this->usrPseudo;
    }

    public function getUsrPwd() {
        return $this->usrPwd;
    }

    public function getUsrEmail() {
        return $this->usrEmail;
    }

    public function getUsrNbPoint() {
        return $this->usrNbPoint;
    }

    public function getUsrId() {
        return $this->usrId;
    }

    public function setUsrPseudo($usrPseudo) {
        $this->usrPseudo = $usrPseudo;
        return $this;
    }

    public function setUsrPwd($usrPwd) {
        $this->usrPwd = $usrPwd;
        return $this;
    }

    public function setUsrEmail($usrEmail) {
        $this->usrEmail = $usrEmail;
        return $this;
    }

    public function setUsrNbPoint($usrNbPoint) {
        $this->usrNbPoint = $usrNbPoint;
        return $this;
    }

    public function setUsrId($usrId) {
        $this->usrId = $usrId;
        return $this;
    }


}

