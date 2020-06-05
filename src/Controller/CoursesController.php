<?php

namespace App\Controller;

use App\Entity\Chapter;
use App\Entity\Course;
use App\Repository\CourseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/courses")
 */
class CoursesController extends AbstractController
{
    private $courseRepo;

    public function __construct(CourseRepository $courseRepository) {
        $this->courseRepo = $courseRepository;
    }

    /**
     * @Route("/", name="courses")
     */
    public function index()
    {
        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }

    /**
     * @Route("/{id}-{slugCourse}/chapitre-{chapter_id}", name="loadCourse")
     * @ParamConverter("oourse", options={"id" = "id"})
     * @ParamConverter("chapter", options={"id" = "chapter_id"})
     */
    public function loadCourse(Course $course, Chapter $chapter){
        $template = $course->getId().'-'.$course->getSlug().'/chapitre'.$chapter->getNumero();
        return $this->render('courses/'.$template.'.html.twig', [
            'controller_name' => 'CoursesController',
            'course'          => $course,
            'chapter'         => $chapter,
        ]);
    }
}
