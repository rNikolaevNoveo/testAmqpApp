<?php

namespace App\Controller;

use App\Form\IntegerValueType;
use App\Services\SumValuesProducerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param SumValuesProducerService $producer
     * @return Response
     */
    public function index(Request $request, SumValuesProducerService $producer): Response
    {

        $form = $this->createForm(IntegerValueType::class);
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $msg = [
                    'value_1' =>$form->getData()->getValueOne(),
                    'value_2' =>$form->getData()->getValueTwo()
                ];

                try {
                    $producer->send($msg);
                } catch (\Throwable $e) {
                    $e->getMessage();
                }

                return $this->redirect('/');
            }
        }

        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
