<?php

namespace App\Controller;

use App\Entity\OpeningsTijden;
use App\Form\OpeningsTijdenType;
use App\Repository\OpeningsTijdenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/openings/tijden")
 */
class OpeningsTijdenController extends AbstractController
{
    /**
     * @Route("/", name="openings_tijden_index", methods="GET")
     */
    public function index(OpeningsTijdenRepository $openingsTijdenRepository): Response
    {
        return $this->render('openings_tijden/index.html.twig', ['openings_tijdens' => $openingsTijdenRepository->findAll()]);
    }

    /**
     * @Route("/new", name="openings_tijden_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $openingsTijden = new OpeningsTijden();
        $form = $this->createForm(OpeningsTijdenType::class, $openingsTijden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($openingsTijden);
            $em->flush();

            return $this->redirectToRoute('openings_tijden_index');
        }

        return $this->render('openings_tijden/new.html.twig', [
            'openings_tijden' => $openingsTijden,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="openings_tijden_show", methods="GET")
     */
    public function show(OpeningsTijden $openingsTijden): Response
    {
        return $this->render('openings_tijden/show.html.twig', ['openings_tijden' => $openingsTijden]);
    }

    /**
     * @Route("/{id}/edit", name="openings_tijden_edit", methods="GET|POST")
     */
    public function edit(Request $request, OpeningsTijden $openingsTijden): Response
    {
        $form = $this->createForm(OpeningsTijdenType::class, $openingsTijden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('openings_tijden_index', ['id' => $openingsTijden->getId()]);
        }

        return $this->render('openings_tijden/edit.html.twig', [
            'openings_tijden' => $openingsTijden,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="openings_tijden_delete", methods="DELETE")
     */
    public function delete(Request $request, OpeningsTijden $openingsTijden): Response
    {
        if ($this->isCsrfTokenValid('delete'.$openingsTijden->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($openingsTijden);
            $em->flush();
        }

        return $this->redirectToRoute('openings_tijden_index');
    }
}
