<?php

namespace App\Controller;

use App\Entity\Categoreis;
use App\Form\CategoreisType;
use App\Repository\CategoreisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorei")
 */

 #controller de categorie
class CategoreisController extends AbstractController
{
    /**
     * @Route("/", name="categoreis_index", methods={"GET"})
     */

    #function index return reponse recuperer de nos entité categorie

    public function index(CategoreisRepository $categoreisRepository): Response
    {
    

        return $this->render('categoreis/index.html.twig', [
            'categoreis' => $categoreisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categoreis_new", methods={"GET","POST"})
     */

         #function new return reponse : ajouter categorie

    public function new(Request $request): Response
    {
        $categorei = new Categoreis();
        $form = $this->createForm(CategoreisType::class, $categorei);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorei);
            $entityManager->flush();

            return $this->redirectToRoute('categoreis_index');
        }

        return $this->render('categoreis/new.html.twig', [
            'categorei' => $categorei,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categoreis_show", methods={"GET"})
     */
             #function show return reponse : afficher categorie

    public function show(Categoreis $categorei): Response
    {
        return $this->render('categoreis/show.html.twig', [
            'categorei' => $categorei,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categoreis_edit", methods={"GET","POST"})
     */

     #function edit return reponse : modifier categorie

    public function edit(Request $request, Categoreis $categorei): Response
    {
        $form = $this->createForm(CategoreisType::class, $categorei);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoreis_index');
        }

        return $this->render('categoreis/edit.html.twig', [
            'categorei' => $categorei,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categoreis_delete", methods={"DELETE"})
     */
         #function delete return reponse : supprimer categorie

    public function delete(Request $request, Categoreis $categorei): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorei->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorei);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categoreis_index');
    }
}
