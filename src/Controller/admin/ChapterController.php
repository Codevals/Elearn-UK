<?php

namespace App\Controller\admin;

use App\Entity\Chapter;
use App\Entity\Course;
use App\Form\ChapterType;
use App\Repository\ChapterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chapter")
 */
class ChapterController extends AbstractController
{
    /**
     * @Route("/{id}-{slug}", name="chapter_index", methods={"GET"})
     */
    public function index(Course $course, ChapterRepository $chapterRepository): Response
    {
        $chapters = $chapterRepository->findBy(['course' => $course]);
        return $this->render('chapter/index.html.twig', [
            'chapters' => $chapters,
            'course'   => $course,
        ]);
    }

    /**
     * @Route("/{id}-{slug}/new", name="chapter_new", requirements={"slug": "[a-z0-9\-]*"}, methods={"GET","POST"})
     */
    public function new(Course $course, Request $request): Response
    {
        $chapter = new Chapter();
        $chapter->setCourse($course);
        $form = $this->createForm(ChapterType::class, $chapter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chapter);
            $entityManager->flush();

            return $this->redirectToRoute('chapter_index', [
                'id'    => $course->getId(),
                'slug'  => $course->getSlug(),
            ]);
        }

        return $this->render('chapter/new.html.twig', [
            'chapter' => $chapter,
            'course'  => $course,
            'form'    => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chapter_show", methods={"GET"})
     */
    public function show(Chapter $chapter): Response
    {
        return $this->render('chapter/show.html.twig', [
            'chapter' => $chapter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chapter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Chapter $chapter): Response
    {
        $form = $this->createForm(ChapterType::class, $chapter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chapter_index', [
                'id' => $chapter->getId(),
            ]);
        }

        return $this->render('chapter/edit.html.twig', [
            'chapter' => $chapter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chapter_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Chapter $chapter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chapter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chapter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chapter_index');
    }
}
