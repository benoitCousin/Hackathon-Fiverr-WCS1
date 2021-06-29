<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $John = new User();
        $John->setPseudo('John69');
        $John->setEmail('jd@gmail.com');
        $John->setCreatorQlvl(99);
        $John->setCorrectorQlvl(90);
        $John->setCorrectorExlvl(80);
        $John->setRealisatorExlvl(77);
        $this->addReference('John', $John);

        $manager->persist($John);
    
        $manager->flush();
    }
}
