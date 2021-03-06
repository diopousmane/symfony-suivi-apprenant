<?php

namespace App\DataFixtures;

use App\Entity\Referentiel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ReferentielsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 5; $i++) {
            $referentiel = new Referentiel();
            $referentiel->setLibelle($faker->realText($maxNbChars = 20, $indexSize = 2));
            $referentiel->setProgramme('programme.pdf');
            $referentiel->setPresentation($faker->realText($maxNbChars = 150, $indexSize = 2));
            $referentiel->setCriteresAdmission($faker->realText($maxNbChars = 150, $indexSize = 2));
            $referentiel->setCriteresEvaluation($faker->realText($maxNbChars = 150, $indexSize = 2));

            // $referentiel->addCompetence($this->getReference(GrpeCompetencesFixtures::GCOMPTENCE[$i]));
            $manager->persist($referentiel);
        }

        $manager->flush();
    }
}
