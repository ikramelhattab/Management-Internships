<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */


 #################  creation de l’entité users
 
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Projet", mappedBy="User")
     */
    private $Projets;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_USER');
        $this->Projets = new ArrayCollection();
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->Projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->Projets->contains($projet)) {
            $this->Projets[] = $projet;
            $projet->addUser($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->Projets->contains($projet)) {
            $this->Projets->removeElement($projet);
            $projet->removeUser($this);
        }

        return $this;
    }
}