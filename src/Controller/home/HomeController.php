<?php

namespace App\Controller\home;

use App\Repository\CourseRepository;
use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    private $fast;
    private $fss;


    public function __construct(EtablissementRepository $etablissementRepository) {
        $this->fast = $etablissementRepository->findBy(['libelleCourt' => "FaST"]);
        $this->fss = $etablissementRepository->findBy(['libelleCourt' => "FSS"]);
    }

    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function index(CourseRepository $courseRepository)
    {
        $fastCourses = $courseRepository->findBy(['etablissement' => $this->fast]);
        return $this->render('home/index.html.twig', [
            'fastcourses' => $fastCourses,
        ]);
    }

    /**
     * @return Response
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
