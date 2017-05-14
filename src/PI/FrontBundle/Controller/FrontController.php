<?php

namespace PI\FrontBundle\Controller;

use PI\FrontBundle\Entity\Randonnee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    public function indexFrontAction()
    {
        return $this->render('PIFrontBundle:Front:index.html.twig');
    }


    public function actualiteAction()
    {
        return $this->render('PIFrontBundle:Front:actualite.html.twig');
    }

    public function evenementAction()
    {
        return $this->render('PIFrontBundle:Front:evenement.html.twig');
    }

    public function tacheAction()
    {
        return $this->render('PIFrontBundle:Front:tache.html.twig');
    }

    public function ventelocationAction()
    {
        return $this->render('PIFrontBundle:Front:vente_location.html.twig');
    }

    public function congeAction()
    {
        return $this->render('PIFrontBundle:Front:conge.html.twig');
    }

    public function forumAction()
    {
        return $this->render('PIFrontBundle:Front:forum.html.twig');
    }

    public function messagesAction()
    {
        return $this->render('PIFrontBundle:Front:messages.html.twig');
    }



    public function loginAction()
    {
        return $this->render('PIFrontBundle:Front:login.html.twig');
    }


    public function profil1Action()
    {

        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('PIFrontBundle:Randonnee')->findall();

        return $this->render('PIFrontBundle:Front:profil.html.twig', array(
            'Randonnees' => $publications
        ));
}

    public function getTokenAction()
    {
        return new Response($this->container->get('form.csrf_provider')
            ->generateCsrfToken('authenticate'));
    }
}
