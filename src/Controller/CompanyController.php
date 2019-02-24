<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Company::class);
        $companies = $repository->findAll();

        $args = ['companies' => $companies];

        return $this->render('companies.html.twig', $args);
    }

    /**
     * @Route("/delete/{id}")
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function delete(Request $request, $id): Response {
        $company = $this->getDoctrine()
            ->getRepository(Company::class)
            ->find($id);
/*
        $form = $this->createFormBuilder($company)
            ->add('delete', SubmitType::class)
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest();
            if ($form->get('delete')->isClicked()) {*/
                $em = $this->getDoctrine()->getManager();
                $em->remove($company);
                $em->flush();
                $this->addFlash('success', 'Successful deletion! 😀');

                return $this->redirectToRoute(
                    'app_company_index'
                );
//            }
//        }
    }
}
