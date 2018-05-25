<?php

namespace RaniaBundle\Controller;

use AutoEcoleBundle\Entity\Annulation;
use AutoEcoleBundle\Entity\Entrainement;
use AutoEcoleBundle\Entity\Moniteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Rania/template/layout.html.twig',array('user'=>$this->getUser()));
    }

    public function loginMoniteurAction(Request $request){
        if($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();
            $moniteurUser = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneBy(array('nom'=>$request->get('nom'),'prenom'=>$request->get('prenom')));
            if($moniteurUser == null)
                return $this->redirectToRoute('auto_ecole_moniteur_login');
            return $this->redirectToRoute('auto_ecole_moniteur_dashboard');
        }
        return $this->render('@Rania/Default/login.html.twig');
    }

    public function moniteurDashboardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entrainements = $em->getRepository('AutoEcoleBundle:Entrainement')->findBy(array('moniteur'=>1), array('id' => 'DESC'));
        $moniteur = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneBy(array('id'=>1));
        return $this->render('@Rania/template/layoutadmin.html.twig',array('moniteur'=>$moniteur,'entrainements'=>$entrainements));
    }

    public function entrainementListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entrainements = $em->getRepository('AutoEcoleBundle:Entrainement')->findBy(array(), array('id' => 'DESC'));
        return $this->render('@Rania/entrainement/list.html.twig',array('entrainements'=>$entrainements,'user'=>$this->getUser()));
    }
    function check_in_range($ent_date, $date_from_user)
    {
        $verify=false;
        if($ent_date>$date_from_user->sub(new \DateInterval('PT1H'))&&$ent_date<$date_from_user->add(new \DateInterval('PT2H')))
            $verify = true;
        $date_from_user->sub(new \DateInterval('PT1H'));
        return $verify;
    }
    public function entrainementReserverAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($request->isMethod('POST')){
            $dateentrainement = new \DateTime($request->get('dateentrainement'));
            if($dateentrainement<new \DateTime())
                return $this->render('@Rania/entrainement/dateexpirer.html.twig');
            $moniteur = $em->getRepository('AutoEcoleBundle:Moniteur')->findOneBy(array('id'=>$request->get('moniteur')));
            foreach ($moniteur->getEntrainements() as $entrain){
                if($entrain->isApprouve())
                    if($this->check_in_range($entrain->getDateentrainement(),$dateentrainement))
                        return $this->render('@Rania/entrainement/occupe.html.twig',array('moniteur'=>$moniteur));
            }
            $voiture = $em->getRepository('AutoEcoleBundle:Voiture')->findOneById($request->get('voiture'));
            $candidat = $em->getRepository('AutoEcoleBundle:Candidat')->findOneById($this->getUser()->getId());
            $entrainement = new Entrainement();
            $entrainement->setCandidat($candidat);
            $entrainement->setVoiture($voiture);
            $entrainement->setMoniteur($moniteur);
            $entrainement->setDateentrainement(new \DateTime($request->get('dateentrainement')));
            $entrainement->setApprouve(false);
            $em->persist($entrainement);
            $em->flush();
            return $this->redirectToRoute('rania_entrainement_list');
        }
        $voitures = $em->getRepository('AutoEcoleBundle:Voiture')->findAll();
        $moniteurs = $em->getRepository('AutoEcoleBundle:Moniteur')->findAll();
        return $this->render('@Rania/entrainement/reserver.html.twig',array('voitures'=>$voitures,'moniteurs'=>$moniteurs,'user'=>$this->getUser()));
    }

    public function entrainementSupprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entrainement = $em->getRepository('AutoEcoleBundle:Entrainement')->findOneById($id);
        $em->remove($entrainement);
        $em->flush();
        return $this->redirectToRoute('rania_entrainement_list');
    }

    public function entrainementAnnulerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entrainement = $em->getRepository('AutoEcoleBundle:Entrainement')->findOneBy(array('id'=>$id));
        $annulation = new Annulation();
        $user = $this->getUser();
        if($user != null)
            $annulation->setPostedby(0);
        else
            $annulation->setPostedby(1);
        $annulation->setEntrainement($entrainement);
        $annulation->setDateAnnulation(new \DateTime());
        $em->persist($annulation);
        $entrainement->setAnnulation($annulation);
        $em->merge($entrainement);
        $em->flush();
        if($user == null){
            return $this->redirectToRoute('auto_ecole_moniteur_dashboard');
        }
        else{
            return $this->redirectToRoute('rania_entrainement_list');
        }
    }

    public function entrainementApprouverAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entrainement = $em->getRepository('AutoEcoleBundle:Entrainement')->findOneBy(array('id'=>$id));
        $entrainement->setApprouve(true);
        $em->merge($entrainement);
        $em->flush();
        return $this->redirectToRoute('auto_ecole_moniteur_dashboard');
    }

    public function annulationApprouverAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $annulation = $em->getRepository('AutoEcoleBundle:Annulation')->findOneBy(array('id'=>$id));
        $em->remove($annulation);
        $em->flush();
        if($this->getUser() == null){
            return $this->redirectToRoute('auto_ecole_moniteur_dashboard');
        }
        else{
            return $this->redirectToRoute('rania_entrainement_list');
        }
    }


}
