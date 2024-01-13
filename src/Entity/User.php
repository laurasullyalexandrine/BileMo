<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation\Exclude;

/**
 * @Serializer\XmlRoot("user")
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *         "api_user",
 *          parameters = {"id" = "expr(object.getId())"}
 *      ),
 * )
 * 
 * @Serializer\XmlRoot("user")
 * @Hateoas\Relation(
 *      "update",
 *      href = @Hateoas\Route(
 *         "api_update_user",
 *          parameters = {"id" = "expr(object.getId())"}
 *      ),
 * )
 * 
 *  @Serializer\XmlRoot("user")
 * @Hateoas\Relation(
 *      "delete",
 *      href = @Hateoas\Route(
 *         "api_delete_user",
 *          parameters = {"id" = "expr(object.getId())"}
 *      ),
 * )
 * 
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: "Cet email existe déjà. Merci de le modifier.")]
class User
{
    const HASH_COST = 12;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 34)]
    #[Assert\NotBlank(message: "Le prénom de l'utilisateur est obligatoire")]
    private ?string $firstname = null;

    #[ORM\Column(length: 84)]
    #[Assert\NotBlank(message: "Le nom de l'utilisateur est obligatoire")]
    private ?string $lastname = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Vous devez choisir la civilité de l'utilisateur")]
    private ?string $civility = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank(message: "Le téléphone de l'utilisateur est obligatoire")]
    private ?string $phone = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: "L'email de l'utilisateur est obligatoire")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le mot de passe de l'utilisateur est obligatoire. Il devra être changé à sa première connexion.")]
    #[Assert\Length(min: 8, minMessage: "Le mot de passe doit faire au moins {{ limit }} caractères")]
    private ?string $password = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'users', cascade: ['persist'])]
    #[Exclude()]
    private ?Client $client = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function __toString()
    {
        return $this->firstname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): static
    {
        $this->civility = $civility;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }
}
