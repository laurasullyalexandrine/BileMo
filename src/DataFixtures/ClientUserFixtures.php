<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientUserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $client = new Client();
        $client->setName("High End Smart")
            ->setEmail("gracekelly@high-end-smart.com")
            ->setSiret("XXX XXX XXX XXXXX")
            ->setCreatedAt(new \DateTimeImmutable())
            ->setPassword(
                $this->hasher->hashPassword(
                    $client,
                    'admindatafixtures'
                )
            );

        $manager->persist($client);

        $manager->flush();
    }
}
