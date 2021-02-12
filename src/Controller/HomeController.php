<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Projet;

use App\Entity\Categoreis;
use App\Repository\ProjetRepository;
use App\Repository\CategoreisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;



class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
         #function index pour trouver tous catégories

    public function index(CategoreisRepository $categoreisRepository)
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
            'categories' => $categoreisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/projets/{id}", name="projets")
     */
         #function projets pour chercher un projet selon categorie de projet

     
    public function projets(Categoreis $categorei,ProjetRepository $projetRepository)
    {
        $id = $categorei->getId();
        return $this->render('home/projets.html.twig', [
            'controller_name' => 'HomeController',
            'projets' => $projetRepository->findby(array('category'=>$id)),
        ]);
    }

 /**
     * @Route("/dash" ,name="dash");
    */

    public function number()
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Projet::class);
        $listepfa =$repo->findAll();
        
        if ($this->isGranted('ROLE_ADMIN')) {
        return $this->render('admin.html.twig', [
            'pfas' => $listepfa,
        ]);
        }
    }
 /**
     * @Route("/participe/{id}" ,name="inscri", methods={"GET","POST"});
    */
     #function participe cndition d'ajouter un projet de chaque participant s'il a un projet il ne peut pas ajouter un autre projet (chaque participant un seul projet pfa)

    public function participe(Projet $projet)
    {
        try{
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $user = $this->getUser();
            $projet->setUser($user);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('home');
        }catch(FileException $e){
          var_dump('Erreur vous avez deja un projet');die;
        }
    }
}




