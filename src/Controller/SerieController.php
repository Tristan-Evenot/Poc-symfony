<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\CreateSerieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/series", name="series")
     */
    public function events(Request $request): Response
    {
        $series = $this->getDoctrine()->getRepository(Serie::class)->findAll();


        return $this->render('serie/listeSeries.html.twig', [
            'series'=> $series,
        ]);
    }
    /**
     * @Route("/creationSerie", name="creationSerie")
     */
    public function CreationSerie(Request $request)
    {
        $serie = new Serie();
        $form = $this->createForm(CreateSerieType::class, $serie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();

            return $this->redirectToRoute('creationSerie');
        }
        return $this->render('serie/serie.html.twig', [
            'ajoutSerieForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/deleteSerie/{id}",name="deleteSerie")
     *
     */
    public function removeSerie(Serie $serie){
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($serie);
        $manager->flush();

        return $this->redirectToRoute('series');
    }
    /**
     * @Route("/modifSerie/{id}",name="modifSerie")
     *
     */
    public function modifSerie(Request $request, Serie $serie){
        $form = $this->createForm(CreateSerieType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();
        }
        return $this->render('modifSerie.html.twig', [
            'event_form' => $form->createView(),
            'serie'=> $serie,
        ]);
    }
}
