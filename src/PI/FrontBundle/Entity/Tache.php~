<?php
namespace PI\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;
/**
 * Class Tache
 * @package PI\FrontBundle\Entity
 */

/**
 * @ORM\Entity
 */
class Tache
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="date",nullable=false)
     */
    private $datedebut;

    /**
     * @ORM\Column(type="date",nullable=false)
     */
    private $datefin;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $User;





    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Tache
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Tache
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tache
     */
    public function setDescription($description)
    {
        $this->Description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set user
     *
     * @param \PI\FrontBundle\Entity\User $user
     *
     * @return Tache
     */
    public function setUser(\PI\FrontBundle\Entity\User $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PI\FrontBundle\Entity\User
     */
    public function getUser()
    {
        return $this->User;
    }
}
