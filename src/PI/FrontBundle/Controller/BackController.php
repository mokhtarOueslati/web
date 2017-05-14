<?php

namespace PI\FrontBundle\Controller;

use PI\FrontBundle\Entity\Evenement;
use PI\FrontBundle\Entity\Tache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;


class BackController extends Controller
{


    public function indexBackAction()
    {
        return $this->render('PIFrontBundle:Back:indexBack.html.twig');
    }

    public function loginAction()
    {
        return $this->render('PIFrontBundle:Front:login.html.twig');
    }

    public function listeEveAction()
    {
        $em=$this->getDoctrine()->getManager();
        $eve=$em->getRepository("PIFrontBundle:Evenement")->findAll();
        return $this->render('PIFrontBundle:Back:listeEve.html.twig',array("evenements"=>$eve));
    }

    public function SuppEveAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $eve=$em->getRepository("PIFrontBundle:Evenement")->find($id);
        $em->remove($eve);
        $em->flush();

        return $this->redirectToRoute("pi_back_listeEve");
    }

    public function ajoutEveAction(Request $request)
    {
        $eve = new Evenement();
        if ($request->isMethod('POST')) {


            $eve->setCategorie($request->get('categorie'));
            $eve->setNom($request->get('nom'));
            $eve->setLieu($request->get('lieu'));
            $eve->setDescription($request->get('description'));
            $eve->setDateDebut($request->get('date_debut'));
            $eve->setDateFin($request->get('date_fin'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($eve);
            $em->flush();
            return $this->redirectToRoute("pi_back_listeEve");

        }
        return $this->render("PIFrontBundle:Back:ajoutEve.html.twig", array());
    }

    //************************************* partie des tâches
  public function ajouterTacheAction(Request $request)
    {
        $tache = new Tache();
        if ($request->isMethod('POST')) {


            $datedebut = new \DateTime($request->get('datedebut'));
            $datefin = new \DateTime($request->get('datefin'));

            if( ($datefin < $datedebut) || ($datedebut< new \DateTime())|| ($datefin<new \DateTime()))
            { return $this->render('PIFrontBundle:Back:alertAjoutTache.html.twig');}

            else {

                $tache->setDatedebut($datedebut);
                $tache->setDatefin($datefin);
                $tache->setDescription($request->get('description'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($tache);
                $em->flush();
            }

            return $this->redirectToRoute("pi_back_liste_taches");
        }
        return $this->render("PIFrontBundle:Back:ajouterTache.html.twig", array());

    }

    public function listeTacheAction()
    {
        $em=$this->getDoctrine()->getManager();
        $tache=$em->getRepository("PIFrontBundle:Tache")->findAll();
        return $this->render('PIFrontBundle:Back:listeTache.html.twig',array("tache"=>$tache));
    }


}
