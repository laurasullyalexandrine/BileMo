<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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
    private ?string $memory = null;

    #[ORM\Column]
    private ?int $megapixels = null;

    #[ORM\Column(length: 10)]
    private ?string $operating_system = null;

    #[ORM\Column(length: 34)]
    private ?string $resolution = null;

    #[ORM\Column(length: 5)]
    private ?string $network = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $manufacturer_reference = null;

    #[ORM\Column]
    private ?bool $card_reader = null;

    #[ORM\Column]
    private ?int $release_year = null;

    #[ORM\Column(length: 34)]
    private ?string $serie = null;

    #[ORM\Column(length: 84)]
    private ?string $card_sim = null;

    #[ORM\Column(length: 10)]
    private ?string $weight = null;

    #[ORM\Column(length: 10)]
    private ?string $height = null;

    #[ORM\Column(length: 10)]
    private ?string $width = null;

    #[ORM\Column(length: 10)]
    private ?string $depth = null;

    #[ORM\Column(length: 10)]
    private ?string $garantee = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
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

    public function getMemory(): ?string
    {
        return $this->memory;
    }

    public function setMemory(string $memory): static
    {
        $this->memory = $memory;

        return $this;
    }

    public function getMegapixels(): ?int
    {
        return $this->megapixels;
    }

    public function setMegapixels(int $megapixels): static
    {
        $this->megapixels = $megapixels;

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

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(string $resolution): static
    {
        $this->resolution = $resolution;

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

    public function getManufacturerReference(): ?string
    {
        return $this->manufacturer_reference;
    }

    public function setManufacturerReference(?string $manufacturer_reference): static
    {
        $this->manufacturer_reference = $manufacturer_reference;

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

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): static
    {
        $this->serie = $serie;

        return $this;
    }

    public function getCardSim(): ?string
    {
        return $this->card_sim;
    }

    public function setCardSim(string $card_sim): static
    {
        $this->card_sim = $card_sim;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(string $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getDepth(): ?string
    {
        return $this->depth;
    }

    public function setDepth(string $depth): static
    {
        $this->depth = $depth;

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
}
