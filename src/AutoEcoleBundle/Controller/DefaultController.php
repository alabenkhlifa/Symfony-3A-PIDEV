<?php

namespace AutoEcoleBundle\Controller;

use AutoEcoleBundle\Entity\Entrainement;
use Composer\XdebugHandler\Status;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints\Date;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AutoEcoleBundle:Default:index.html.twig');
    }

    public function loginAction($email,$password,$type)
    {
        $em = $this->getDoctrine()->getManager();
        if ($type==0){
            $candidat = $em->getRepository('AutoEcoleBundle:Candidat')->findOneBy(
                array('email' => $email,'motdepasse'=>$password));
            if($candidat != null){
                $myresponse = array(
                    'id' => $candidat->getId(),
                    'nom' => $candidat->getNom(),
                    'prenom' => $candidat->getPrenom(),
                    'cin' => $candidat->getCin()
                );

                return new JsonResponse($myresponse);
            }
        }else{
            $candidat = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneBy(
                array('email' => $email,'motdepasse'=>$password));
            if($candidat != null){
                $myresponse = array(
                    'id' => $candidat->getId(),
                    'nom' => $candidat->getNom(),
                    'prenom' => $candidat->getPrenom(),
                    'cin' => $candidat->getCin()
                );

                return new JsonResponse($myresponse);
            }
        }
        throw new NotFoundHttpException();
    }
    public function getAllVoitureAction()
    {
        $em = $this->getDoctrine()->getManager();
        $voitures = $em->getRepository('AutoEcoleBundle:Voiture')->findAll();
        $arrayCollection = array();

        foreach($voitures as $voiture) {
            $arrayCollection[] = array(
                'id' => $voiture->getId(),
                'immatricule' => $voiture->getImmatricule(),
                'marque' => $voiture->getMarque(),
                'modele' => $voiture->getModele(),
                'age' => $voiture->getAge(),
                'couleur' => $voiture->getCouleur(),
                'cout' => $voiture->getCout()
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function getVoitureAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $voitures = $em->getRepository('AutoEcoleBundle:Voiture')->findOneById($id);


        $arrayCollection[] = array(
            'id' => $voitures->getId(),
            'immatricule' => $voitures->getImmatricule(),
            'marque' => $voitures->getMarque(),
            'modele' => $voitures->getModele(),
            'age' => $voitures->getAge(),
            'couleur' => $voitures->getCouleur(),
            'cout' => $voitures->getCout()
        );


        return new JsonResponse($arrayCollection);
    }
    public function getAllCandidatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $candidats = $em->getRepository('AutoEcoleBundle:Candidat')->findAll();
        $arrayCollection = array();

        foreach($candidats as $candidat) {
            $arrayCollection[] = array(
                'id' => $candidat->getId(),
                'permis_id' => $candidat->getPermis(),
                'code_id' => $candidat->getCode(),
                'nom' => $candidat->getNom(),
                'prenom' => $candidat->getPrenom(),
                'cin' => $candidat->getCin(),
                'age' => $candidat->getAge(),
                'email' => $candidat->getEmail()
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function getAllEntrainementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entrainements = $em->getRepository('AutoEcoleBundle:Entrainement')->findAll();
        $arrayCollection = array();

        foreach($entrainements as $entrainement) {
            $candidat = $entrainement->getCandidat();
            $moniteur = $entrainement->getMoniteur();
            $voiture = $entrainement->getVoiture();
            $annulation = $entrainement->getAnnulation();
            if($candidat!=null)
                $idcandidat = $entrainement->getCandidat()->getId();
            else
                $idcandidat = null;
            if($moniteur!=null)
                $idmoniteur = $entrainement->getMoniteur()->getId();
            else
                $idmoniteur = null;
            if($voiture!=null)
                $idvoiture = $entrainement->getVoiture()->getId();
            else
                $idvoiture = null;
            if($annulation!=null)
                $idannulation = $entrainement->getAnnulation()->getId();
            else
                $idannulation = null;
            $arrayCollection[] = array(
                'id' => $entrainement->getId(),
                'candidate_id' => $idcandidat,
                'moniteur_id' => $idmoniteur,
                'voiture_id' => $idvoiture,
                'dateentrainement' => $entrainement->getDateentrainement(),
                'approuve' => $entrainement->isApprouve(),
                'annulation_id' => $idannulation
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function getAllMonitorAction()
    {
        $em = $this->getDoctrine()->getManager();
        $monitors = $em->getRepository('AutoEcoleBundle:Moniteur')->findAll();
        $arrayCollection = array();

        foreach($monitors as $monitor) {
            $arrayCollection[] = array(
                'id' => $monitor->getId(),
                'nom' => $monitor->getNom(),
                'prenom' => $monitor->getPrenom(),
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function getMonitorAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $monitors = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneById($id);

        $arrayCollection[] = array(
            'id' => $monitors->getId(),
            'nom' => $monitors->getNom(),
            'prenom' => $monitors->getPrenom(),
        );

        return new JsonResponse($arrayCollection);
    }

    public function getCalendarbyMonitorAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $monitor = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneById($id);
        /*$repocan = $em->getRepository('AutoEcoleBundle:Candidat');
        $repomon = $em->getRepository('AutoEcoleBundle:Moniteur');
        $repovoiture = $em->getRepository('AutoEcoleBundle:Voiture');*/
        if($monitor != null){
            $entrainements = $em->getRepository('AutoEcoleBundle:Entrainement')->findBy(
                array('moniteur' => $monitor,'approuve' => true));
            $arrayCollection = array();

            foreach($entrainements as $entrainement) {
                $arrayCollection[] = array(
                    'id' => $entrainement->getId(),
                    'candidate_id' => $entrainement->getCandidat()->getId(),
                    'moniteur_id' => $entrainement->getMoniteur()->getId(),
                    'voiture_id' => $entrainement->getVoiture()->getId(),
                    'dateentrainement' => $entrainement->getDateentrainement()->getTimestamp(),
                );
            }
            return new JsonResponse($arrayCollection);
        }
        return new Response('No Monitor Found');
    }

    public function createentrainementAction($idcandidat,$idmonitor,$idvoiture,$date)
    {
        $em = $this->getDoctrine()->getManager();
        $candidat = $em->getRepository('AutoEcoleBundle:Candidat')->findOneById($idcandidat);
        $monitor = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneById($idmonitor);
        $voiture = $em->getRepository('AutoEcoleBundle:Voiture')->findOneById($idvoiture);
        $entrainement = new Entrainement();
        $entrainement->setCandidat($candidat);
        $entrainement->setMoniteur($monitor);
        $entrainement->setVoiture($voiture);
        $entrainement->setApprouve(0);

        $datet = new \DateTime($date);
        $entrainement->setDateentrainement($datet);
        $em->persist($entrainement);
        $em->flush();
        return new Response('Success');
    }

    public function approuverentrainementAction($identrainement)
    {
        $em = $this->getDoctrine()->getManager();
        $entrainement = $em->getRepository('AutoEcoleBundle:Entrainement')->findOneBy(array('id'=>$identrainement));
        $entrainement->setApprouve(true);
        $em->merge($entrainement);
        $em->flush();
        return new Response('approuvé');
    }


    public function disapprouverentrainementAction($identrainement)
    {
        $em = $this->getDoctrine()->getManager();
        $entrainement = $em->getRepository('AutoEcoleBundle:Entrainement')->findOneBy(array('id'=>$identrainement));
        $entrainement->setApprouve(false);
        $em->merge($entrainement);
        $em->flush();
        return new Response('désapprouvé');
    }

}
