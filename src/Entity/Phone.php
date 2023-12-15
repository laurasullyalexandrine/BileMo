<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @Serializer\XmlRoot("phone")
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *         "api_phone",
 *           parameters = {"slug" = "expr(object.getSlug())", "color" = "expr(object.getColor())"}
 *      ),
 * )
 * 
 */
#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $model = null;

    /**
     * @Gedmo\Slug(fields={"model"})
     *
     * @var string|null
     */
    #[ORM\Column(length: 128)]
    private ?string $slug = null;

    #[ORM\Column(length: 10)]
    private ?string $color = null;

    #[ORM\Column(length: 84)]
    private ?string $operator_lock = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 1)]
    private ?string $screen_size = null;

    #[ORM\Column(length: 10)]
    private ?string $storage_capacity = null;

    #[ORM\Column]
    private ?bool $dual_sim = null;

    #[ORM\Column(length: 10)]
    private ?string $operating_system = null;

    #[ORM\Column(length: 5)]
    private ?string $network = null;

    #[ORM\Column]
    private ?bool $card_reader = null;

    #[ORM\Column]
    private ?int $release_year = null;

    #[ORM\Column(length: 10)]
    private ?string $garantee = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'phone', targetEntity: Image::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $images;

    #[ORM\ManyToOne(inversedBy: 'phones', cascade: ['persist'])]
    private ?Brand $brand = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->images = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->model;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getOperatorLock(): ?string
    {
        return $this->operator_lock;
    }

    public function setOperatorLock(string $operator_lock): static
    {
        $this->operator_lock = $operator_lock;

        return $this;
    }

    public function getScreenSize(): ?string
    {
        return $this->screen_size;
    }

    public function setScreenSize(string $screen_size): static
    {
        $this->screen_size = $screen_size;

        return $this;
    }

    public function getStorageCapacity(): ?string
    {
        return $this->storage_capacity;
    }

    public function setStorageCapacity(string $storage_capacity): static
    {
        $this->storage_capacity = $storage_capacity;

        return $this;
    }

    public function isDualSim(): ?bool
    {
        return $this->dual_sim;
    }

    public function setDualSim(bool $dual_sim): static
    {
        $this->dual_sim = $dual_sim;

        return $this;
    }

    public function getOperatingSystem(): ?string
    {
        return $this->operating_system;
    }

    public function setOperatingSystem(string $operating_system): static
    {
        $this->operating_system = $operating_system;

        return $this;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(string $network): static
    {
        $this->network = $network;

        return $this;
    }

    public function isCardReader(): ?bool
    {
        return $this->card_reader;
    }

    public function setCardReader(bool $card_reader): static
    {
        $this->card_reader = $card_reader;

        return $this;
    }

    public function getReleaseYear(): ?int
    {
        return $this->release_year;
    }

    public function setReleaseYear(int $release_year): static
    {
        $this->release_year = $release_year;

        return $this;
    }
    
    public function getGarantee(): ?string
    {
        return $this->garantee;
    }

    public function setGarantee(string $garantee): static
    {
        $this->garantee = $garantee;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setPhone($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPhone() === $this) {
                $image->setPhone(null);
            }
        }

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }
}
