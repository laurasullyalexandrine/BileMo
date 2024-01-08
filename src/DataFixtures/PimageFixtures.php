<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Phone;
use App\Repository\PhoneRepository;
use Symfony\Component\Finder\Finder;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class PimageFixtures extends Fixture
{
    public function __construct(
        private PhoneRepository $phoneRepository,
        private SluggerInterface $slugger
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        $finder = new Finder();
        $tempImage = iterator_to_array($finder->in(__DIR__ . '/resources'));

        // Images
        foreach ($tempImage as $images) {
            $image = new Image();
            $image->setName($images->getFilename())
                ->setCreatedAt(new \DateTimeImmutable());

            $phone = $this->findPhoneByImageName($image->getName());
            if ($phone !== null) {
                $image->setPhone($phone);
                $manager->persist($image);
            }
        }
        $manager->flush();
    }

    private function findPhoneByImageName(string $imageName): ?Phone
    {
        foreach ($this->phoneRepository->findAll() as $phone) {
            $slug = $this->slugger->slug($phone->getSlug())->toString();

            if (preg_match('/^' . $slug . '/', $imageName)) {
                return $phone;
            }
        }
        return null;
    }
}
