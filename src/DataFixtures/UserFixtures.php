<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    
        $generator = Factory::create("fr_FR");

     
            $user = new User();
            $user->setEmail("vanaeca@hotmail.com");
            $user->setFirstname("Caroline");
            $user->setLastname("van Aerschot");
            $user->isIsActivate(true);
            $user->setPassword('$2y$13$tjUXCkp.qZy3saYGee.7TuZknDDXF6dA.Mngnp.4W3yrx9i/HZb4a');
            $user->setActivationToken(bin2hex(random_bytes(32)));
            $manager->persist($user);
       
        $manager->flush();

    }
}
