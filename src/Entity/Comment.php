<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="comments:get"}},
 * "post"={"normalization_context"={"groups"="comments:post"}, "denormalization_context"={"groups"="comments:createpost"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="comment:get"}},
 * "put"={"normalization_context"={"groups"="comment:put"}, "denormalization_context"={"groups"="comments:editput"}},
 * "delete"={"normalization_context"={"groups"="comment:delete"}}},
 * )
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"comments:get", "comments:post", "comment:get", "comments:get", "comment:put", "comment:delete"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"comments:get", "comments:post", "comments:createpost", "comment:get", "comment:put", "comments:editput", "comment:delete"})
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"comments:get", "comments:post", "comments:createpost", "comment:get", "comment:put", "comments:editput", "comment:delete"})
     */
    private $userId;

    /**
     * @ORM\Column(name="creation_date", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     * @Groups({"comments:get", "comments:post", "comment:get", "comment:put", "comment:delete"})
     */
    private $creation_date;

    /**
     * @ORM\PrePersist
     */
    public function onPrePersistSetCreationDate()
    {
        $this->creation_date = new \DateTime();
    }

    /**
     * @ORM\PostPersist
     */
    public function onPostPersistSetCreationDate()
    {
        $this->creation_date = new \DateTime();
    }

    public function __construct()
    {
        $this->creation_date = new \DateTime();
    }

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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

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
