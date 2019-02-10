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
            'company-acme' => ['Acme',Company::$TYPE_CUSTOMER,null,null],
            'company-google' => ['Google',Company::$TYPE_SOFTWARE_VENDOR, 5, null],
            'company-ibm' => ['IBM',Company::$TYPE_SOFTWARE_VENDOR, 4, null],
            'company-abba' => ['Abba',Company::$TYPE_RECRUITMENT_COMPANY, 3, null],
            'company-sp' => ['Sp',Company::$TYPE_SOLUTION_PROVIDER, 0, null],
        ];
    }
}
