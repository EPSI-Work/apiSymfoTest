<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="comments:get"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="comment:get"}},
 * "put"={"normalization_context"={"groups"="comments:put"}},
 * "delete"={"normalization_context"={"groups"="comments:delete"}}},
 * )
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"comments:get", "comment:get", "comments:put", "comments:delete"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"comments:get", "comment:get", "comments:put", "comments:delete"})
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"comments:get", "comment:get", "comments:put", "comments:delete"})
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     * @Groups({"comments:get", "comment:get", "comments:put", "comments:delete"})
     */
    private $creation_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(?\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }
}
