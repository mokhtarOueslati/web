<?php


namespace PI\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="reservation")
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    Private $id ;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User)
    {
        $this->User = $User;
    }

    /**
     * @return mixed
     */
    public function getRandonnee()
    {
        return $this->randonnee;
    }

    /**
     * @param mixed $randonnee
     */
    public function setRandonnee($randonnee)
    {
        $this->randonnee = $randonnee;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="User_id",referencedColumnName="id")
     */
    private $User ;

    /**
     * @ORM\ManyToOne(targetEntity="Randonnee")
     * @ORM\JoinColumn(name="randonnee_id",referencedColumnName="id")
     */
    private $randonnee ;
}