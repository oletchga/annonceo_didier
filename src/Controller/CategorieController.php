<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CategorieType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index()
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    /**
     * @Route("/categorie/add", name="categorie_form", methods="GET")
     */
    public function form(Request $request)
    {

        $form = $this->createForm(CategorieType::class);
        return $this->render('categorie/index.html.twig', [
            'form' => $form->createView(),
        ]);

    }


    /**
     * @Route("/categorie/add", name="categorie_add", methods="POST")
     * @IsGranted("ROLE_ADMIN")
     */
    public function add(Request $rq, EntityManagerInterface $em)
    {
//les donnees de $_POST peuvent etre recuperes avec
        //$request->request->get("nomDuFormulaire") qui est un array(comme $_POST)

        //creer un formulaire
        $form = $this->createForm(CategorieType::class);

        //passer la requete HTTP au formulaire
        $form->handleRequest($rq);
        if ($form->isSubmitted() && $form->isValid()) {

            //recuperer les donnees envoyees (si le formulmaire est lie a une entite, getData() renvoie un
            //objet de la calsse de cette entite

            //$date = $form->getData();
            //$titre = $data["titre"];
            //$motscles = $data["motscles"];
            $data = $form->getData();


            //$cat = New Categorie;
            //$cat->setTitre($rq->request->get("categorie")["titre"]);
            //$cat->setMotscles($rq->request->get("categorie")["motscles"]);
            //$em->persist($cat);
            $em->persist($data);
            $resultat = $em->flush();
            $form = $this->createForm(CategorieType::class);

            $this->addFlash('success', 'Categorie créee!');
            return $this->redirectToRoute("categorie_add");
        } elseif (!$form->isValid()) {
            $this->addFlash('error', 'Données pas valides');
                //$form = $this->createForm(CategorieType::class, $form->getData());
                return $this->render('categorie/index.html.twig', [
                    'form' => $form->createView(),
             ]);


        }


    }
}

