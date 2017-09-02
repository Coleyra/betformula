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

    /**
     * @var string
     *
     * @ORM\Column(name="API_DRIVER_ID", type="string")
     */
    private $apiDriverId;

    public function getPilNom() {
        return $this->pilNom;
    }

    public function getPilPrenom() {
        return $this->pilPrenom;
    }

    public function getPilId() {
        return $this->pilId;
    }

    public function setPilNom($pilNom) {
        $this->pilNom = $pilNom;
        return $this;
    }

    public function setPilPrenom($pilPrenom) {
        $this->pilPrenom = $pilPrenom;
        return $this;
    }

    public function setPilId($pilId) {
        $this->pilId = $pilId;
        return $this;
    }

    public function getApiDriverId() {
        return $this->apiDriverId;
    }

    public function setApiDriverId($apiDriverId) {
        $this->apiDriverId = $apiDriverId;
        return $this;
    }

}

