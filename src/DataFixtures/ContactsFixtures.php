<?php

namespace App\DataFixtures;

use App\Entity\Contacts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = Factory::create("fr_FR");

        for ($i = 0; $i <= 100; $i++) {
            $idea = new Contacts();
            $idea->setLastName($generator->lastname);
            $idea->setFirstname($generator->firstname);
            $idea->setPhone($generator->phoneNumber);
            $manager->persist($idea);
        }
        $manager->flush();
    }
}