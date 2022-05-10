<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Faker\Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);

        
      

        $manager->flush();
    }
}
