<?php

namespace App\Controller;

use App\Entity\Td;
use App\Form\TdType;
use App\Repository\TdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/td")
 */
class TdController extends AbstractController
{
    /**
     * @Route("/", name="td_index", methods={"GET"})
     */
    public function index(TdRepository $tdRepository): Response
    {
        return $this->render('td/index.html.twig', [
            'tds' => $tdRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="td_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $td = new Td();
        $form = $this->createForm(TdType::class, $td);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($td);
            $entityManager->flush();

            return $this->redirectToRoute('td_index');
        }

        return $this->render('td/new.html.twig', [
            'td' => $td,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="td_show", methods={"GET"})
     */
    public function show(Td $td): Response
    {
        return $this->render('td/show.html.twig', [
            'td' => $td,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="td_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Td $td): Response
    {
        $form = $this->createForm(TdType::class, $td);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('td_index', [
                'id' => $td->getId(),
            ]);
        }

        return $this->render('td/edit.html.twig', [
            'td' => $td,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="td_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Td $td): Response
    {
        if ($this->isCsrfTokenValid('delete'.$td->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($td);
            $entityManager->flush();
        }

        return $this->redirectToRoute('td_index');
    }
}
