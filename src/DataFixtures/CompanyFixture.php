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
            $company->setType($companyData[1]);
            $company->setGrading($companyData[2]);
            $company->setComment($companyData[3]);
            $manager->persist($company);
            $this->addReference($key, $company);
        }
        $manager->flush();
    }

    private function getCompaniesData(): array
    {
        return [
            'company-acme' => ['Acme','Customer',null,null],
            'company-google' => ['Google','Software vendor', 5, null],
            'company-ibm' => ['IBM','Software vendor', 4, null],
            'company-abba' => ['Abba','Recruitment company', 3, null],
            'company-sp' => ['Sp','Solution provider', 0, null],
        ];
    }
}
