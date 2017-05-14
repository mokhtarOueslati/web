<?php

namespace PI\FrontBundle\Controller;

use PI\FrontBundle\Entity\Randonnee;
use PI\FrontBundle\Entity\Reservation;
use PI\FrontBundle\Form\RandonneeType;
use PI\FrontBundle\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Randonnee controller.
 *
 */
class RandonneeController extends Controller
{
    /**
     * Lists all randonnee entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('PIFrontBundle:Randonnee')->findall();

        return $this->render('PIFrontBundle:randonnee:index.html.twig', array(
            'Randonnees' => $publications,
        ));
    }

    /**
     * Creates a new randonnee entity.
     *
     */
    public function newAction(Request $request)
    {
        $publication = new Randonnee();
        $form = $this->createForm(RandonneeType::class, $publication);
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid()) {


            $publication->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $publication->upload();
            $em->persist($publication);
            $em->flush($publication);

            return $this->redirectToRoute('Randonnee_index', array('id' => $publication->getId()));
        }

        return $this->render('PIFrontBundle:randonnee:new.html.twig', array(
            'randonnee' => $publication,
            'form' => $form->createView(),
        ));
    }



    /**
     * Finds and displays a randonnee entity.
     *
     */
    public function showAction(Randonnee $publication)
    {
        $deleteForm = $this->createDeleteForm($publication);

        return $this->render('PIFrontBundle:randonnee:show.html.twig', array(
            'randonnee' => $publication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing randonnee entity.
     *
     */
    public function editAction(Request $request, Randonnee $publication)
    {
        $deleteForm = $this->createDeleteForm($publication);
        $editForm = $this->createForm('PI\FrontBundle\Form\RandonneeType', $publication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
           $em= $this->getDoctrine()->getManager();
            $publication->upload();
            $em->flush($publication);
            $publication->upload();


            return $this->redirectToRoute('Randonnee_index', array('id' => $publication->getId()));
        }

        return $this->render('PIFrontBundle:randonnee:edit.html.twig', array(
            'randonnee' => $publication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a randonnee entity.
     *
     */
    public function deleteAction(Request $request, Randonnee $publication)
    {
        $form = $this->createDeleteForm($publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($publication);
            $em->flush($publication);
        }

        return $this->redirectToRoute('Randonnee_index');
    }

    /**
     * Creates a form to delete a randonnee entity.
     *
     * @param Randonnee $publication The randonnee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Randonnee $publication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Randonnee_delete', array('id' => $publication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function jaimeAction(Randonnee $publication )
    {
        $em=$this->getDoctrine()->getManager();
        $publication->setJaime($publication->getJaime()+1);
        $em->persist($publication);
        $em->flush($publication);
        return $this->redirectToRoute('Randonnee_index');
    }

    public function jaimepasAction(Randonnee $publication )
    {
        $em=$this->getDoctrine()->getManager();
        $publication->setJaimepas($publication->getJaimepas()+1);
        $em->persist($publication);
        $em->flush($publication);
        return $this->redirectToRoute('Randonnee_index');
    }
    public function rechercheAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $publications=$em->getRepository("PIFrontBundle:Randonnee")->findAll();

        if (isset($_POST['rech'])) {
            $date1 = $_POST['debut'];
            $date2 = $_POST['fin'];
            $query = $em->createQuery(
                "SELECT e
                 FROM PIFrontBundle:Randonnee e
                 WHERE e.date >= '$date1' AND e.date <= '$date2'"
            );
            $publications = $query->getResult();
            return $this->render(('PIFrontBundle:randonnee:recherche.html.twig'), array(
                'Randonnees' => $publications,
            ));
        }

        return $this->render(('PIFrontBundle:randonnee:recherche.html.twig'), array(
            'Randonnees' => $publications,
        ));
    }

    public function suppAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("PIFrontBundle:Randonnee")->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('Randonnee_index');
    }

    public function affbackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('PIFrontBundle:Randonnee')->findall();

        return $this->render('PIFrontBundle:Back:affAct.html.twig', array(
            'Randonnees' => $publications,
        ));
    }

    public function suppbackAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("PIFrontBundle:Randonnee")->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('affback');
    }


    public function listeAction()
    {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT e
         FROM PIFrontBundle:Randonnee e
          WHERE e.jaime > e.jaimepas
           ORDER BY e.jaime DESC '
        );
        $publications = $query->getResult();


        return $this->render(('PIFrontBundle:randonnee:liste.html.twig'), array(
            'Randonnees' => $publications,
        ));
    }

    public function reserverAction(Request $request, Randonnee $randonnee)
    {
        $r = new Reservation();
       $r->setRandonnee($randonnee);
       $r->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
       $res= $em->getRepository('PIFrontBundle:Reservation')->findBy(array('User'=>$this->getUser()));

       $test = true;
       $message="";



       foreach ($res as $rser)  {
           if ($rser->getRandonnee()->getDatedepart()->format('Y-m-d H:i:s') == $randonnee->getDatedepart()->format('Y-m-d H:i:s'))
           {
               $request->getSession()
                   ->getFlashBag()
                   ->add('fail', 'Reservation Non Aboutie');
              // $test=false;
               return $this->redirectToRoute('Randonnee_index',array());



           }

       }

            $randonnee->setPlaces($randonnee->getPlaces()-1);
            $em->persist($randonnee);
            $em->flush($randonnee);
            $em->persist($r);
            $em->flush($r);


            return $this->redirectToRoute('Randonnee_index', array('id' => $r->getId()));
        }


    public function mapAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();

        $Ran= $em->getRepository('PIFrontBundle:Randonnee')->find($id);
        $R= $Ran->getDestination();







        return $this->render('@PIFront/randonnee/map.html.twig',array('M'=>$R));
    }




}
