<?php

namespace App\Controller;

use App\Entity\Restaurants;
use App\Form\RestaurantsType;
use App\Repository\RestaurantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/restaurants")
 */
class RestaurantsController extends AbstractController
{
    /**
     * @Route("/", name="restaurants_index", methods="GET")
     */
    public function index(RestaurantsRepository $restaurantsRepository): Response
    {
        return $this->render('restaurants/index.html.twig', ['restaurants' => $restaurantsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="restaurants_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $restaurant = new Restaurants();
        $form = $this->createForm(RestaurantsType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($restaurant);
            $em->flush();

            return $this->redirectToRoute('restaurants_index');
        }

        return $this->render('restaurants/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restaurants_show", methods="GET")
     */
    public function show(Restaurants $restaurant): Response
    {
        return $this->render('restaurants/show.html.twig', ['restaurant' => $restaurant]);
    }

    /**
     * @Route("/{id}/edit", name="restaurants_edit", methods="GET|POST")
     */
    public function edit(Request $request, Restaurants $restaurant): Response
    {
        $form = $this->createForm(RestaurantsType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restaurants_index', ['id' => $restaurant->getId()]);
        }

        return $this->render('restaurants/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restaurants_delete", methods="DELETE")
     */
    public function delete(Request $request, Restaurants $restaurant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurant->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($restaurant);
            $em->flush();
        }

        return $this->redirectToRoute('restaurants_index');
    }
}
