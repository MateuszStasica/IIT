<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonController extends AbstractController
{
    /**
     * @Route("/person")
     */
    public function getForm(): Response
    {
        $personForm = $this->createFormBuilder([])
            ->add('firstName', TextType::class, ['label' => 'Name'])
            ->add('lastName', TextType::class, ['label' => 'Last Name'])
            ->add('age', IntegerType::class, ['label' => 'Age'])
            ->add('email', TextType::class, ['label' => 'E-mail'])
            ->add('consent', CheckboxType::class, ['label' => 'RODO Consent'])
            ->add('save', SubmitType::class, ['label' => 'Save'])
            ->getForm();

        return $this->render('form.html.twig', [
            'personForm' => $personForm->createView(),
            ]);
    }
}