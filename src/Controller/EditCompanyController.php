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

class EditCompanyController extends AbstractController
{
    /**
     * @Route("/editCompany/{id}", name="app_editcompany_number")
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function editCompany(int $id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $company = $em
            ->getRepository(Company::class)
            ->find($id);


        $formBuilder = $this->createFormBuilder($company);
        $formBuilder->add('name', TextType::class, ['disabled' => true])
//            ->add('id', IntegerType::class)
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
                'edit',
                SubmitType::class,
                [
                    'label' => 'Edit',
                    'attr' => ['class' => 'btn btn-default btn-block'],
                ]
            );
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->get('edit')->isClicked() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($company);
                $em->flush();
                $this->addFlash(
                    'success',
                    'Validation of your update ! 😀'
                );

                return $this->redirectToRoute(
                    'app_company_index'
                );
            }
        }


        return $this->render('editCompany.html.twig', ['company' => $company, 'form' => $form->createView()]);
    }
}
