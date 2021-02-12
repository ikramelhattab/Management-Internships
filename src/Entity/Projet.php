<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 */


 ################ creation de l’entité projets
 
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $technologie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
    *@ORM\Column(type="string")
    * @Assert\NotBlank(message="Please, upload the photo.") 
    * @Assert\File(mimeTypes={ "image/png", "image/jpeg" }) 
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $encadrant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoreis", inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $user;


    public function __construct()
    {
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getTechnologie(): ?string
    {
        return $this->technologie;
    }

    public function setTechnologie(?string $technologie): self
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getEncadrant(): ?string
    {
        return $this->encadrant;
    }

    public function setEncadrant(string $encadrant): self
    {
        $this->encadrant = $encadrant;

        return $this;
    }

    public function getCategory(): ?categoreis
    {
        return $this->category;
    }

    public function setCategory(?categoreis $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->contains($user)) {
            $this->User->removeElement($user);
        }

        return $this;
    }
    public function __toString() 
    {
    return (string) $this->nom; 
    
    }
}
