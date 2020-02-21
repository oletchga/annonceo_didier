<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository as CR;
use App\Repository\AnnonceRepository as AR;
use App\Repository\MembreRepository as MR;


class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(AR $annRepo, CR $catRepo, MR $membreRepo)
    {
        //dd("hgfd");
        $categories = $catRepo->findAll();
        $membres = $membreRepo->findAll();
        $regions = $annRepo->findRegions();
        //dd($regions);
        $annonces = $annRepo->findAll();
        return $this->render('base.html.twig', compact("categories", "membres", "annonces", "regions"));
    }
}
