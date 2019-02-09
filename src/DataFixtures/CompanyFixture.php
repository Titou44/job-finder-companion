<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompanyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $companiesData = $this->getCompaniesData();
        foreach ($companiesData as $key => $companyData) {
            $company = new Company();
            $company->setName($companyData[0]);
            $manager->persist($company);
            $this->addReference($key, $company);
        }
        $manager->flush();
    }

    private function getCompaniesData(): array
    {
        return [
            'company-acme' => ['Acme'],
            'company-google' => ['Google'],
            'company-ibm' => ['IBM'],
        ];
    }
}
