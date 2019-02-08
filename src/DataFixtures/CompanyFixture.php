<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompanyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $company = new Company();
        $company->setName('Acme');
        $manager->persist($company);


        $manager->flush();
    }
}
