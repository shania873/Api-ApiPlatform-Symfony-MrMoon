<?php

namespace App\DataFixtures;

use App\Entity\Places;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PlacesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $generator = Factory::create("fr_FR");

        for ($i = 0; $i <= 100; $i++) {
            $idea = new Places();
            $idea->setName($generator->streetName);
            $idea->setAdress($generator->address);
            $manager->persist($idea);
        }
        $manager->flush();
    }
}
