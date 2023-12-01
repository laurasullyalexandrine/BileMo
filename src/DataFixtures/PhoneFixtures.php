<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Phone;
use App\Repository\BrandRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class PhoneFixtures extends Fixture
{
    public function __construct(
        private SluggerInterface $slugger,
        private BrandRepository $brandRepository
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $phoneDatas = [
            1 => [
                'model' => 'iPhone 15 Pro Max',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            2 => [
                'model' => 'iPhone 15 Pro Max',
                'color' => 'bleu',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            3 => [
                'model' => 'iPhone 15 Pro Max',
                'color' => 'naturel',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            4 => [
                'model' => 'Galaxy S23',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'Androïd',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            5 => [
                'model' => 'Galaxy S23',
                'color' => 'blanc',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'Androïd',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            6 => [
                'model' => 'Galaxy S23',
                'color' => 'gris',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'Androïd',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            7 => [
                'model' => 'Galaxy S23 Ultra',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'Androïd',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            8 => [
                'model' => 'Galaxy S23 Ultra',
                'color' => 'rose',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'Androïd',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            9 => [
                'model' => 'Galaxy S23 Ultra',
                'color' => 'bordeaux',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'Androïd',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            10 => [
                'model' => 'Galaxy S23 Ultra',
                'color' => 'creme',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            11 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            12 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'creme',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            13 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'rose',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            14 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'vert',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            15 => [
                'model' => 'Galaxy Z Fold5',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            16 => [
                'model' => 'Galaxy Z Fold5',
                'color' => 'bleu',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            17 => [
                'model' => 'Galaxy Z Fold5',
                'color' => 'creme',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            18 => [
                'model' => 'Google P8 Pro',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            19 => [
                'model' => 'Google P8 Pro',
                'color' => 'bleu',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            20 => [
                'model' => 'Google P8 Pro',
                'color' => 'rose',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            21 => [
                'model' => 'Honor Magic 5',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            22 => [
                'model' => 'Honor Magic 5',
                'color' => 'vert',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            23 => [
                'model' => 'Huawei P6O Pro',
                'color' => 'chrome',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            24 => [
                'model' => 'Huawei X3 Pro',
                'color' => 'chrome',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
            25 => [
                'model' => 'Huawei P5O Pro',
                'color' => 'chrome',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                'operating_system' => 'iOS',
                'card_reader' => true,
                'network' => '5G',
                'release_year' => 2023,
                'garantee' => '2 ans',
            ],
        ];

        // Phones
        foreach ($phoneDatas as $phoneData) {
            $phone = new Phone();
            $phone->setModel($phoneData["model"])
                ->setSlug(strtolower($this->slugger->slug($phone->getModel())))
                ->setColor($phoneData["color"])
                ->setOperatorLock($phoneData["operator_lock"])
                ->setScreenSize($phoneData["screen_size"])
                ->setStorageCapacity($phoneData["storage_capacity"])
                ->setDualSim($phoneData["dual_sim"])
                ->setOperatingSystem($phoneData["operating_system"])
                ->setCardReader($phoneData["card_reader"])
                ->setNetwork($phoneData["network"])
                ->setReleaseYear($phoneData["release_year"])
                ->setGarantee($phoneData["garantee"])
                ->setDescription($faker->text(60));


            if (preg_match('/^iPhone/', $phone->getModel())) {
                $brand = $this->brandRepository->findOneByName("Apple");
                $phone->setBrand($brand);
            } elseif (preg_match('/^Galaxy/', $phone->getModel())) {
                $brand = $this->brandRepository->findOneByName("Samsung");
                $phone->setBrand($brand);
            } elseif (preg_match('/^Google/', $phone->getModel())) {
                $brand = $this->brandRepository->findOneByName("Google");
                $phone->setBrand($brand);
            } elseif (preg_match('/^Honor/', $phone->getModel())) {
                $brand = $this->brandRepository->findOneByName("Honor");
                $phone->setBrand($brand);
            } elseif (preg_match('/^Huawei/', $phone->getModel())) {
                $brand = $this->brandRepository->findOneByName("Huawei");
                $phone->setBrand($brand);
            }

            $manager->persist($phone);
        }
        $manager->flush();
    }
}
