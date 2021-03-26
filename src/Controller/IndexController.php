<?php

namespace App\Controller;

use App\DTO\Request\IntegerValueDto;
use App\Form\IntegerValueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param IntegerValueDto $dto
     * @return Response
     */
    public function index(Request $request, IntegerValueDto $dto): Response
    {

        $form = $this->createForm(IntegerValueType::class);
        //$form->handleRequest();
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {

                return $this->redirect('/');
            }
        }

        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
