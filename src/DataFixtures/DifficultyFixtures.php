<?php

namespace App\DataFixtures;

use App\Entity\Difficulty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DifficultyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $difficulty = new Difficulty();
        $difficulty->setName('débutant');
        $difficulty->setPoints(10);
        $this->addReference('débutant', $difficulty);
        
        $difficulty2 = new Difficulty();
        $difficulty2->setName('intermédiaire');
        $difficulty2->setPoints(30);
        $this->addReference('intermédiaire', $difficulty2);
        
        $difficulty3 = new Difficulty();
        $difficulty3->setName('expert');
        $difficulty3->setPoints(100);
        $this->addReference('expert', $difficulty3);

        $manager->persist($difficulty);
        $manager->persist($difficulty2);
        $manager->persist($difficulty3);
    
        $manager->flush();
    }
}
