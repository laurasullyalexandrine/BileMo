<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
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

        $option = ['cost' => User::HASH_COST];
        for ($um = 0; $um < 15; $um++) {
            $userMale = new User();
            $userMale->setFirtname($faker->firstNameMale())
                ->setLastname($faker->lastName())
                ->setCivility("monsieur")
                ->setPhone($faker->phoneNumber())
                ->setEmail(strtolower($userMale->getFirtname() . '.' . $userMale->getLastname()) . '@' . $faker->freeEmailDomain())
                ->setPassword(
                    password_hash(
                        'usermaledatafixtures',
                        PASSWORD_BCRYPT,
                        $option,
                    )
                )
                ->setCreatedAt(new \DateTimeImmutable())
                ->setClient($client);
            $manager->persist($userMale);
        }

        for ($uf = 0; $uf < 15; $uf++) {
            $userFemale = new User();
            $userFemale->setFirtname($faker->firstNameFemale())
                ->setLastname($faker->lastName())
                ->setCivility("madame")
                ->setPhone($faker->phoneNumber())
                ->setEmail(strtolower($userFemale->getFirtname() . '.' . $userFemale->getLastname()) . '@' . $faker->freeEmailDomain())
                ->setPassword(
                    password_hash(
                        'userfemaledatafixtures',
                        PASSWORD_BCRYPT,
                        $option,
                    )
                )
                ->setCreatedAt(new \DateTimeImmutable())
                ->setClient($client);
            $manager->persist($userFemale);
        }

        $manager->flush();
    }
}
