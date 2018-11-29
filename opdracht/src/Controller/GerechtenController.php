<?php

namespace App\Controller;

use App\Entity\Gerechten;
use App\Form\GerechtenType;
use App\Repository\GerechtenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gerechten")
 */
class GerechtenController extends AbstractController
{
    /**
     * @Route("/", name="gerechten_index", methods="GET")
     */
    public function index(GerechtenRepository $gerechtenRepository): Response
    {
        return $this->render('gerechten/index.html.twig', ['gerechtens' => $gerechtenRepository->findAll()]);
    }

    /**
     * @Route("/new", name="gerechten_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $gerechten = new Gerechten();
        $form = $this->createForm(GerechtenType::class, $gerechten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gerechten);
            $em->flush();

            return $this->redirectToRoute('gerechten_index');
        }

        return $this->render('gerechten/new.html.twig', [
            'gerechten' => $gerechten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gerechten_show", methods="GET")
     */
    public function show(Gerechten $gerechten): Response
    {
        return $this->render('gerechten/show.html.twig', ['gerechten' => $gerechten]);
    }

    /**
     * @Route("/{id}/edit", name="gerechten_edit", methods="GET|POST")
     */
    public function edit(Request $request, Gerechten $gerechten): Response
    {
        $form = $this->createForm(GerechtenType::class, $gerechten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gerechten_index', ['id' => $gerechten->getId()]);
        }

        return $this->render('gerechten/edit.html.twig', [
            'gerechten' => $gerechten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gerechten_delete", methods="DELETE")
     */
    public function delete(Request $request, Gerechten $gerechten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gerechten->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gerechten);
            $em->flush();
        }

        return $this->redirectToRoute('gerechten_index');
    }
}
