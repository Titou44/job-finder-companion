<?php

namespace App\Tests\Entity;

use App\Entity\Company;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    public function testGetName()
    {
        $company = new Company();
        $company->setName('Acme');
        $this->assertEquals('Acme', $company->getName());
    }
}
