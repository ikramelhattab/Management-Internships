<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetUserRepository")
 */
class ProjetUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $projet_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjetId(): ?int
    {
        return $this->projet_id;
    }

    public function setProjetId(int $projet_id): self
    {
        $this->projet_id = $projet_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
