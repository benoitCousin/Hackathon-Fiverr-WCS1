<?php

namespace App\DataFixtures;

use App\Entity\Challenge;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChallengeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $challenge = new Challenge();
        $challenge->setTitle('Création d\'un header avec Bootstrap');
        $challenge->setDescription('Ce challenge a pour but de tester votre aptitude à créer un header sous forme de menu burger avec Bootstrap 5. Pour accéder aux détails complets de ce challenge, veuillez cliquez sur le lien ci-dessous. Bon courage!');
        $challenge->setStatus(1);
        $challenge->setValidation('Le challenge est réussi si le menu burger apparait en version mobile et s\'il est fonctionnel.');
        $date = new DateTime();
        $challenge->setCreatedAt($date);
        $challenge->setLink('http//www.example.com');
        $challenge->setDifficultyLevel($this->getReference('débutant'));
        $challenge->setCreator($this->getReference('John'));

        $manager->persist($challenge);
    
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          DifficultyFixtures::class,
          UserFixtures::class,
        ];
    }
}
