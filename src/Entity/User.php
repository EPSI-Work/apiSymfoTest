<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="users:get"}},
 * "post"={"normalization_context"={"groups"="users:post"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="user:get"}},
 * "put"={"normalization_context"={"groups"="user:put"}},
 * "delete"={"normalization_context"={"groups"="user:delete"}}},
 * )
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"users:get", "users:post", "user:get", "user:put", "user:delete"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users:get", "users:post", "user:get", "user:put", "user:delete"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users:get", "users:post", "user:get", "user:put", "user:delete"})
     */
    private $lastname;

    public function getId(): ?int
    {
        return $this->id;
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
}
