<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Company::class);
        $companies = $repository->findAll();

        $args = ['companies' => $companies];

        return $this->render('companies.html.twig', $args);
    }
}
