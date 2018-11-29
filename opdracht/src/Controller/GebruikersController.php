<?php

namespace App\Controller;

use App\Entity\Gebruikers;
use App\Form\GebruikersType;
use App\Repository\GebruikersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gebruikers")
 */
class GebruikersController extends AbstractController
{
    /**
     * @Route("/", name="gebruikers_index", methods="GET")
     */
    public function index(GebruikersRepository $gebruikersRepository): Response
    {
        return $this->render('gebruikers/index.html.twig', ['gebruikers' => $gebruikersRepository->findAll()]);
    }

    /**
     * @Route("/new", name="gebruikers_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $gebruiker = new Gebruikers();
        $form = $this->createForm(GebruikersType::class, $gebruiker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gebruiker);
            $em->flush();

            return $this->redirectToRoute('gebruikers_index');
        }

        return $this->render('gebruikers/new.html.twig', [
            'gebruiker' => $gebruiker,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gebruikers_show", methods="GET")
     */
    public function show(Gebruikers $gebruiker): Response
    {
        return $this->render('gebruikers/show.html.twig', ['gebruiker' => $gebruiker]);
    }

    /**
     * @Route("/{id}/edit", name="gebruikers_edit", methods="GET|POST")
     */
    public function edit(Request $request, Gebruikers $gebruiker): Response
    {
        $form = $this->createForm(GebruikersType::class, $gebruiker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gebruikers_index', ['id' => $gebruiker->getId()]);
        }

        return $this->render('gebruikers/edit.html.twig', [
            'gebruiker' => $gebruiker,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gebruikers_delete", methods="DELETE")
     */
    public function delete(Request $request, Gebruikers $gebruiker): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gebruiker->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gebruiker);
            $em->flush();
        }

        return $this->redirectToRoute('gebruikers_index');
    }
}
