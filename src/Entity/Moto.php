<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\SubresourceDataProvider;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints\Unique;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MotoRepository")
 * @ApiFilter(
 *     SearchFilter::class,
 *     properties={
 *      "marque":"partial", "model":"partial",
 *      "version":"partial", "prix":"partial",
 *      "boiteDeVitesse":"partial", "kilometrage":"partial",
 *      "carburant":"partial", "categoriemoto":"partial","annee":"partial",
 *      "kw":"partial", "cylindre":"partial",
 *      "qualites":"partial", "categorie":"partial", "couleur":"partial",
 *      "places":"partial", "equipement":"partial", "equipementSuplementaire":"partial",
 *      "qualiteEquipement":"partial", "consommation":"partial", "co2EmissionBis":"partial",
 *      "normesEmission":"partial", "npaLieu":"partial", "rayon":"partial", "ageDelAnnonce":"partial",
 *      "tri":"partial", "sidleQualite":"partial","ch":"partial",
 *      "poidsRemarquable":"partial"
 * })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"motos_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "ads_get_subresource"={"path"="/users/{id}/motos"},
 *          "api_users_motos_get_subresource"={"groups"={"motos_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class Moto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="La marque est obligatoire")
     * @Assert\Length(min=2, minMessage="La marque doit être compris entre 3 et 255 caractères",
     * max=255, maxMessage="La marque doit être compris entre 3 et 255 caractères")
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="Le modele est obligatoire")
     * @Assert\Length(min=3, minMessage="Le modele doit être compris entre 3 et 255 caractères",
     * max=255, maxMessage="Le modele doit être compris entre 3 et 255 caractères")
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="La version est obligatoire")
     * @Assert\Length(min=1, minMessage="La version doit être compris entre 1 et 255 caractères",
     * max=255, maxMessage="La version doit être compris entre 8 et 255 caractères")
     */
    private $version;



    /**
     * @ORM\Column(type="float")
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="Le prix est obligatoire")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="La boite de vitesse est obligatoire")
     * @Assert\Length(min=6, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $boiteDeVitesse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="La roue motrice est obligatoire")
     * @Assert\Length(min=1, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $rouesMotrices;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="Le kilometrage est obligatoire")
     * @Assert\Length(min=1, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="Le type de carburant est oblogatoire")
     * @Assert\Length(min=1, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $carburant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     * @Assert\NotBlank(message="La roue est obligatoire")
     * @Assert\Length(min=1, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $categorieMoto;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $categorieLicence;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $kw;



    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $cylindre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $qualites;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $couleur;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $places;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $equipement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $equipementSuplementaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $qualiteEquipement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $consommation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $co2EmissionBis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $normesEmission;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $npaLieu;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $rayon;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $ageDelAnnonce;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $tri;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $sigleQualite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="motos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $ch;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $poidsRemarquable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"motos_read","motos_subresource","users_reads"})
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }


    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getBoiteDeVitesse(): ?string
    {
        return $this->boiteDeVitesse;
    }

    public function setBoiteDeVitesse(string $boiteDeVitesse): self
    {
        $this->boiteDeVitesse = $boiteDeVitesse;

        return $this;
    }

    public function getRouesMotrices(): ?string
    {
        return $this->rouesMotrices;
    }

    public function setRouesMotrices(string $rouesMotrices): self
    {
        $this->rouesMotrices = $rouesMotrices;

        return $this;
    }


    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(string $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getCategorieMoto(): ?string
    {
        return $this->categorieMoto;
    }

    public function setCategorieMoto(string $categorieMoto): self
    {
        $this->categorieMoto = $categorieMoto;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getCategorieLicence(): ?string
    {
        return $this->categorieLicence;
    }

    public function setCategorieLicence(string $categorieLicence): self
    {
        $this->categorieLicence = $categorieLicence;

        return $this;
    }


    public function getKw(): ?string
    {
        return $this->kw;
    }

    public function setKw(string $kw): self
    {
        $this->kw = $kw;

        return $this;
    }

    public function getCylindre(): ?string
    {
        return $this->cylindre;
    }

    public function setCylindre(string $cylindre): self
    {
        $this->cylindre = $cylindre;

        return $this;
    }

    public function getQualites(): ?string
    {
        return $this->qualites;
    }

    public function setQualites(string $qualites): self
    {
        $this->qualites = $qualites;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }


    public function getPlaces(): ?string
    {
        return $this->places;
    }

    public function setPlaces(string $places): self
    {
        $this->places = $places;

        return $this;
    }

    public function getEquipement(): ?string
    {
        return $this->equipement;
    }

    public function setEquipement(string $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getEquipementSuplementaire(): ?string
    {
        return $this->equipementSuplementaire;
    }

    public function setEquipementSuplementaire(?string $equipementSuplementaire): self
    {
        $this->equipementSuplementaire = $equipementSuplementaire;

        return $this;
    }

    public function getQualiteEquipement(): ?string
    {
        return $this->qualiteEquipement;
    }

    public function setQualiteEquipement(?string $qualiteEquipement): self
    {
        $this->qualiteEquipement = $qualiteEquipement;

        return $this;
    }

    public function getConsommation(): ?string
    {
        return $this->consommation;
    }

    public function setConsommation(?string $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getCo2EmissionBis(): ?string
    {
        return $this->co2EmissionBis;
    }

    public function setCo2EmissionBis(?string $co2EmissionBis): self
    {
        $this->co2EmissionBis = $co2EmissionBis;

        return $this;
    }

    public function getNormesEmission(): ?string
    {
        return $this->normesEmission;
    }

    public function setNormesEmission(?string $normesEmission): self
    {
        $this->normesEmission = $normesEmission;

        return $this;
    }

    public function getNpaLieu(): ?string
    {
        return $this->npaLieu;
    }

    public function setNpaLieu(string $npaLieu): self
    {
        $this->npaLieu = $npaLieu;

        return $this;
    }

    public function getRayon(): ?string
    {
        return $this->rayon;
    }

    public function setRayon(string $rayon): self
    {
        $this->rayon = $rayon;

        return $this;
    }

    public function getAgeDelAnnonce(): ?string
    {
        return $this->ageDelAnnonce;
    }

    public function setAgeDelAnnonce(string $ageDelAnnonce): self
    {
        $this->ageDelAnnonce = $ageDelAnnonce;

        return $this;
    }

    public function getTri(): ?string
    {
        return $this->tri;
    }

    public function setTri(string $tri): self
    {
        $this->tri = $tri;

        return $this;
    }

    public function getSigleQualite(): ?string
    {
        return $this->sigleQualite;
    }

    public function setSigleQualite(string $sigleQualite): self
    {
        $this->sigleQualite = $sigleQualite;

        return $this;
    }

    public function getUsers(): ?user
    {
        return $this->users;
    }

    public function setUsers(?user $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getCh(): ?string
    {
        return $this->ch;
    }

    public function setCh(string $ch): self
    {
        $this->ch = $ch;

        return $this;
    }

    public function getPoidsRemarquable(): ?string
    {
        return $this->poidsRemarquable;
    }

    public function setPoidsRemarquable(string $poidsRemarquable): self
    {
        $this->poidsRemarquable = $poidsRemarquable;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

}
