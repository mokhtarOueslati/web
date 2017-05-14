<?php


namespace PI\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;

/**
 *
 */

/**
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;


    /**
     * @ORM\Column(type="string",length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $description;






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
     * Set nom
     *
     * @param string $nom
     *
     * @return Evenement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Evenement
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Evenement
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set dateDebut
     *
     * @param string $dateDebut
     *
     * @return Evenement
     */
    public function setDateDebut($dateDebut)
    {
        $this->date_debut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return string
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     *
     * @return Evenement
     */
    public function setDateFin($dateFin)
    {
        $this->date_fin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
