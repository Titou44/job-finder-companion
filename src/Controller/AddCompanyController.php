<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddCompanyController extends AbstractController
{
    /**
     * @Route("/addCompany")
     */
    public function addCompany(Request $request): Response
    {
        $company = new Company();

        $formBuilder = $this->createFormBuilder($company);
        $formBuilder->add('name', TextType::class)
            ->add(
                'type',
                ChoiceType::class,
                [
                    'choices' => Company::getTypes(),
                ]
            )
            ->add(
                'grading',
                ChoiceType::class,
                [
                    'choices' => [
                        '0' => 0,
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                    ],
                ]
            )
            ->add('comment', TextareaType::class, ['required' => false])
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Add',
                    'attr' => ['class' => 'btn btn-default btn-block'],
                ]
            );
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($company);
                $em->flush();
            }
        }


        return $this->render('addCompany.html.twig', ['form' => $form->createView()]);
    }
}
