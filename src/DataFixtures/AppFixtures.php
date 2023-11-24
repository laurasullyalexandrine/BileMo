<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $phoneDatas = [
            1 => [
                'model' => 'iPhone 15 Pro Max',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'iPhone 15 Pro Max',
                'color' => 'bleu',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'iPhone 15 Pro Max',
                'color' => 'naturel',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy S23',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy S23',
                'color' => 'blanc',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy S23',
                'color' => 'gris',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy S23  Ultra',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy S23 Ultra',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy S23 Ultra',
                'color' => 'bordeaux',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Ollie Nollie',
                'color' => 'creme',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'creme',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'rose',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Flip5',
                'color' => 'vert',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Fold5',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Fold5',
                'color' => 'bleu',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Galaxy Z Fold5',
                'color' => 'creme',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Google P8 Pro',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Google P8 Pro',
                'color' => 'bleu',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Google P8 Pro',
                'color' => 'rose',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Honor Magic 5',
                'color' => 'noir',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Honor Magic 5',
                'color' => 'vert',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Huawei P6O Pro',
                'color' => 'chrome',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Huawei X3 Pro',
                'color' => 'chrome',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
            1 => [
                'model' => 'Huawei P5O Pro',
                'color' => 'chrome',
                'operator_lock' => 'Débloqué tout opérateur',
                'screen_size' => '6.1',
                'storage_capacity' => '256 Go',
                'dual_sim' => true,
                ''
            ],
        ];
        

        $manager->flush();
        
    }
}
