<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\SubresourceDataProvider;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints\Unique;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("username", message="Cette adresse email exite déja")
 * @ORM\Table(name="utilisateur")
 *
 * @ApiFilter(SearchFilter::class, properties={"firstname":"partial", "lastname":"partial"})
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=20
 *     },
 *     normalizationContext={
 *          "groups"={"users_reads"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "vehicules_get_subresource"={"path"="/users/{id}/vehicules"},
 *          "bandeDessinees_get_subresource"={"path"="/users/{id}/bande_dessinees"},
 *          "immobiliers_get_subresource"={"path"="/users/{id}/immobiliers"},
 *          "campingCars_get_subresource"={"path"="/users/{id}/camping_cars"},
 *          "livres_get_subresource"={"path"="/users/{id}/livres"},
 *          "montres_get_subresource"={"path"="/users/{id}/montres"},
 *          "motos_get_subresource"={"path"="/users/{id}/motos"}
 *     }
 *
 *
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"users_reads","montres_read","livres_read","vehicules_read","motos_read",
     *     "immobiliers_read","bandeDessinees_read","immobiliers_subresource",
     *     "bandeDessinees_subresource","vehicules_subresource","motos_subresource",
     *     "montres_subresource","livres_subresource",})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"users_reads","montres_read","livres_read","vehicules_read","motos_read",
     *     "immobiliers_read","bandeDessinees_read","immobiliers_subresource",
     *     "bandeDessinees_subresource","vehicules_subresource","motos_subresource",
     *     "montres_subresource","livres_subresource",})
     * @Assert\Email(
     *     message = "Le mail '{{ value }}' n'est pas un email valide.")
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Le mot de passe est obligatoire")
     * @Assert\Length(min=6, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users_reads","montres_read","livres_read","vehicules_read","motos_read",
     *     "immobiliers_read","bandeDessinees_read","immobiliers_subresource",
     *     "bandeDessinees_subresource","vehicules_subresource","motos_subresource",
     *     "montres_subresource","livres_subresource",})
     * @Assert\NotBlank(message="Le mon est obligatoire")
     * @Assert\Length(min=2, minMessage="le nombre de caractère doit être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 2 et 255 caractères")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users_reads","montres_read","livres_read","vehicules_read","motos_read",
     *     "immobiliers_read","bandeDessinees_read","immobiliers_subresource",
     *     "bandeDessinees_subresource","vehicules_subresource","motos_subresource",
     *     "montres_subresource","livres_subresource",})
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     * @Assert\Length(min=2, minMessage="le nombre de caractère doit être compris entre 6 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 6 et 255 caractères")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users_reads","montres_read","livres_read","vehicules_read","motos_read",
     *     "immobiliers_read","bandeDessinees_read","immobiliers_subresource",
     *     "bandeDessinees_subresource","vehicules_subresource","motos_subresource",
     *     "montres_subresource","livres_subresource",})
     * @Assert\NotBlank(message="Le pays est obligatoire")
     * @Assert\Length(min=2, minMessage="le nombre de caractère doit être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 2 et 255 caractères")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users_reads","montres_read","livres_read","vehicules_read","motos_read",
     *     "immobiliers_read","bandeDessinees_read","immobiliers_subresource",
     *     "bandeDessinees_subresource","vehicules_subresource","motos_subresource",
     *     "montres_subresource","livres_subresource",})
     * @Assert\NotBlank(message="La ville est obligatoire")
     * @Assert\Length(min=2, minMessage="le nombre de caractère doit être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le nombre de caractère doit être compris entre 2 et 255 caractères")
     */
    private $city;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicule", mappedBy="users")
     */
    private $vehicules;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Moto", mappedBy="users")
     */
    private $motos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BandeDessinee", mappedBy="users")
     */
    private $bandeDessinees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Immobilier", mappedBy="users")
     */
    private $immobiliers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CampingCar", mappedBy="users")
     */
    private $campingCars;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Livre", mappedBy="users")
     */
    private $livres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Montre", mappedBy="users")
     */
    private $montres;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->vehicules = new ArrayCollection();
        $this->motos = new ArrayCollection();
        $this->bandeDessinees = new ArrayCollection();
        $this->immobiliers = new ArrayCollection();
        $this->campingCars = new ArrayCollection();
        $this->livres = new ArrayCollection();
        $this->montres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }



    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setUsers($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->contains($vehicule)) {
            $this->vehicules->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getUsers() === $this) {
                $vehicule->setUsers(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Moto[]
     */
    public function getMotos(): Collection
    {
        return $this->motos;
    }

    public function addMoto(Moto $moto): self
    {
        if (!$this->motos->contains($moto)) {
            $this->motos[] = $moto;
            $moto->setUsers($this);
        }

        return $this;
    }

    public function removeMoto(Moto $moto): self
    {
        if ($this->motos->contains($moto)) {
            $this->motos->removeElement($moto);
            // set the owning side to null (unless already changed)
            if ($moto->getUsers() === $this) {
                $moto->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BandeDessinee[]
     */
    public function getBandeDessinees(): Collection
    {
        return $this->bandeDessinees;
    }

    public function addBandeDessinee(BandeDessinee $bandeDessinee): self
    {
        if (!$this->bandeDessinees->contains($bandeDessinee)) {
            $this->bandeDessinees[] = $bandeDessinee;
            $bandeDessinee->setUsers($this);
        }

        return $this;
    }

    public function removeBandeDessinee(BandeDessinee $bandeDessinee): self
    {
        if ($this->bandeDessinees->contains($bandeDessinee)) {
            $this->bandeDessinees->removeElement($bandeDessinee);
            // set the owning side to null (unless already changed)
            if ($bandeDessinee->getUsers() === $this) {
                $bandeDessinee->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Immobilier[]
     */
    public function getImmobiliers(): Collection
    {
        return $this->immobiliers;
    }

    public function addImmobilier(Immobilier $immobilier): self
    {
        if (!$this->immobiliers->contains($immobilier)) {
            $this->immobiliers[] = $immobilier;
            $immobilier->setUsers($this);
        }

        return $this;
    }

    public function removeImmobilier(Immobilier $immobilier): self
    {
        if ($this->immobiliers->contains($immobilier)) {
            $this->immobiliers->removeElement($immobilier);
            // set the owning side to null (unless already changed)
            if ($immobilier->getUsers() === $this) {
                $immobilier->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CampingCar[]
     */
    public function getCampingCars(): Collection
    {
        return $this->campingCars;
    }

    public function addCampingCar(CampingCar $campingCar): self
    {
        if (!$this->campingCars->contains($campingCar)) {
            $this->campingCars[] = $campingCar;
            $campingCar->setUsers($this);
        }

        return $this;
    }

    public function removeCampingCar(CampingCar $campingCar): self
    {
        if ($this->campingCars->contains($campingCar)) {
            $this->campingCars->removeElement($campingCar);
            // set the owning side to null (unless already changed)
            if ($campingCar->getUsers() === $this) {
                $campingCar->setUsers(null);
            }
        }

        return $this;


    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setUsers($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->contains($livre)) {
            $this->livres->removeElement($livre);
            // set the owning side to null (unless already changed)
            if ($livre->getUsers() === $this) {
                $livre->setUsers(null);
            }
        }

        return $this;

    }

    /**
     * @return Collection|Montre[]
     */
    public function getMontres(): Collection
    {
        return $this->montres;
    }

    public function addMontre(Montre $montre): self
    {
        if (!$this->montres->contains($montre)) {
            $this->montres[] = $montre;
            $montre->setUsers($this);
        }

        return $this;
    }

    public function removeMontre(Montre $montre): self
    {
        if ($this->montres->contains($montre)) {
            $this->montres->removeElement($montre);
            // set the owning side to null (unless already changed)
            if ($montre->getUsers() === $this) {
                $montre->setUsers(null);
            }
        }

        return $this;
    }

}
