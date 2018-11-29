<?php

namespace App\Controller;

use App\Entity\Tafels;
use App\Form\TafelsType;
use App\Repository\TafelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tafels")
 */
class TafelsController extends AbstractController
{
    /**
     * @Route("/", name="tafels_index", methods="GET")
     */
    public function index(TafelsRepository $tafelsRepository): Response
    {
        return $this->render('tafels/index.html.twig', ['tafels' => $tafelsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tafels_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tafel = new Tafels();
        $form = $this->createForm(TafelsType::class, $tafel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tafel);
            $em->flush();

            return $this->redirectToRoute('tafels_index');
        }

        return $this->render('tafels/new.html.twig', [
            'tafel' => $tafel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tafels_show", methods="GET")
     */
    public function show(Tafels $tafel): Response
    {
        return $this->render('tafels/show.html.twig', ['tafel' => $tafel]);
    }

    /**
     * @Route("/{id}/edit", name="tafels_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tafels $tafel): Response
    {
        $form = $this->createForm(TafelsType::class, $tafel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tafels_index', ['id' => $tafel->getId()]);
        }

        return $this->render('tafels/edit.html.twig', [
            'tafel' => $tafel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tafels_delete", methods="DELETE")
     */
    public function delete(Request $request, Tafels $tafel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tafel->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tafel);
            $em->flush();
        }

        return $this->redirectToRoute('tafels_index');
    }
}
