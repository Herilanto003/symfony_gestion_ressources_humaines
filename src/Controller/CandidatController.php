<?php

namespace App\Controller;

use App\Entity\Agent;
use App\Entity\Candidat;
use App\Model\CandidatValidation;
use App\Form\CandidatType;
use App\Form\CandidatValidateType;
use App\Repository\CandidatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/compte/candidat')]
final class CandidatController extends AbstractController
{
    #[Route(name: 'app_candidat_index', methods: ['GET'])]
    public function index(CandidatRepository $candidatRepository): Response
    {
        return $this->render('candidat/index.html.twig', [
            'candidats' => $candidatRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'app_candidat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidat);
            $entityManager->flush();

            return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidat/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidat_show', methods: ['GET'])]
    public function show(Candidat $candidat): Response
    {
        return $this->render('candidat/show.html.twig', [
            'candidat' => $candidat,
        ]);
    }

    #[Route('/{id}/modifier', name: 'app_candidat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidat->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/validation', name:'app_candidat_validate')]
    public function validate(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        $candidatValidation = new CandidatValidation();
        $agent = new Agent();

        $form = $this->createForm(CandidatValidateType::class, $candidatValidation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($candidatValidation);


            $agent->setFirstname($candidat->getFirstname());
            $agent->setLastname($candidat->getLastname());
            $agent->setBirthDate($candidat->getBirthDate());
            $agent->setBirthPlace($candidat->getBirthPlace());
            $agent->setPhone($candidat->getPhone());
            $agent->setEmail($candidat->getEmail());
            $agent->setCin($candidat->getCin());
            $agent->setGenre($candidat->getGenre());
            $agent->setCategory($candidat->getCategory());
            $agent->setDiplome($candidat->getDiplome());
            $agent->setSpecialisation($candidat->getSpecialisation());
            $agent->setSituation($candidat->getSituation());
            $agent->setJob($candidat->getJob());
            $agent->setPlace($candidat->getPlace());

            $agent->setImatricule($candidatValidation->getImatricule());
            $agent->setGrade($candidatValidation->getGrade());
            $agent->setService($candidatValidation->getService());
            $agent->setDirection($candidatValidation->getDirection());
            $agent->setMinistere($candidatValidation->getMinistere());

            $entityManager->persist($agent);
            $entityManager->remove($candidat);

            $entityManager->flush();

            return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidat/validate.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }
}
