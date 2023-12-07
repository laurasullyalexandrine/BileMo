<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientUserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher,
        private SluggerInterface $slugger
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $client = new Client();
        $client->setName("High End Smart")
            ->setSlug(strtolower($this->slugger->slug($client->getName())))
            ->setEmail("gracekelly@high-end-smart.com")
            ->setRoles(["ROLE_ADMIN"])
            ->setSiret("XXX XXX XXX XXXXX")
            ->setCreatedAt(new \DateTimeImmutable())
            ->setPassword(
                $this->hasher->hashPassword(
                    $client,
                    'admindatafixtures'
                )
            );

        $manager->persist($client);

        // Créer un numéro de portable aléatoire
        $randomPhoneNumbers = str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        $phoneNumber = "06" . $randomPhoneNumbers;
        $option = ['cost' => User::HASH_COST];
        for ($um = 0; $um < 15; $um++) {
            $userMale = new User();
            $userMale->setFirstname($faker->firstNameMale())
                ->setLastname($faker->lastName())
                ->setCivility("monsieur")
                ->setPhone($phoneNumber)
                ->setEmail(strtolower($userMale->getFirstname() . '.' . $userMale->getLastname()) . '@' . $faker->freeEmailDomain())
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
            $userFemale->setFirstname($faker->firstNameFemale())
                ->setLastname($faker->lastName())
                ->setCivility("madame")
                ->setPhone($phoneNumber)
                ->setEmail(strtolower($userFemale->getFirstname() . '.' . $userFemale->getLastname()) . '@' . $faker->freeEmailDomain())
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
