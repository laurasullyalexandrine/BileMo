<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class BrandFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $brandDatas = [
            1 => 'Apple',
            2 => 'Samsung',
            3 => 'Honor',
            4 => 'Huawei',
            5 => 'Google',
        ];


        foreach ($brandDatas as $brandData) {
            $brand = new Brand();
            $brand->setName($brandData)
                ->setSlug($this->slugger->slug($brand->getName()))
                ->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($brand);
        }

        $manager->flush();
    }
}
