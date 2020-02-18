<?php

namespace JardinBundle\Controller;

use JardinBundle\Entity\abonnement;
use JardinBundle\Entity\Abonnmentad;
use JardinBundle\Form\abonnementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class abonnementController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $abonnements = $em->getRepository('JardinBundle:abonnement')->findAll();
        return $this->render('JardinBundle:Parent:Abonnement.html.twig', array(
            'abonnements' => $abonnements,
        ));
    }
    /*Purchase Abonment*/
    public function abnselectionerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser()->getid();
        $ko = $em->getRepository(Abonnmentad::class)->find($id);
        $enf = $em->getRepository('JardinBundle:enfant')->getenfantparent($user) ;
        return $this->render('JardinBundle:Parent:purchase.html.twig', array(
            'ko' =>$ko,
            'enf'=>$enf
        ));
    }

    public function newAction(Request $request)
    {
        $abonnement = new Abonnement();
        $submittedToken = $request->request->get('token');

        $form = $this->createForm('JardinBundle\Form\abonnementType', $abonnement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && $this->isCsrfTokenValid('add-item', $submittedToken)) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();
            return $this->redirectToRoute('abonnement_show', array('id' => $abonnement->getId()));
        }

        return $this->render('abonnement/new.html.twig', array(
            'abonnement' => $abonnement,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$deleteForm = $this->createDeleteForm($abonnement);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $getidabn = $em->getRepository('JardinBundle:Abonnmentad')->findBy(array('id'=>$request->get('id'))) ;
        $nbrenf = $em->getRepository('JardinBundle:enfant')->SumEnfant($user->getId());
        return $this->render('JardinBundle:Parent:index.html.twig', array(
            'nbrenf' => $nbrenf,'getidabn'=>$getidabn
        ));
    }
    public function registerabnAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $time = new \DateTime();
        $next = new \DateTime();
        $abonnement = new abonnement();
        if ($request->isMethod('POST')) {
            $abonnement->setEnfant($request->get('enfant'));
            $abonnement->setDataDebut($time);
            $abonnement->setDateFin($next->modify("+1 months"));
            $abonnement->setType($request->get('type'));
            $abonnement->setDescription($request->get('description'));
            $em->persist($abonnement);
            $em->flush();
            return new Response('sucess');
        }

    }

    public function editAction(Request $request, abonnement $abonnement)
    {
        $deleteForm = $this->createDeleteForm($abonnement);
        $editForm = $this->createForm('JardinBundle\Form\abonnementType', $abonnement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('abonnement_edit', array('id' => $abonnement->getId()));
        }

        return $this->render('abonnement/edit.html.twig', array(
            'abonnement' => $abonnement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function deleteAction(Request $request, abonnement $abonnement)
    {
        $form = $this->createDeleteForm($abonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($abonnement);
            $em->flush();
        }

        return $this->redirectToRoute('abonnement_index');
    }

    /**
     * Creates a form to delete a abonnement entity.
     *
     * @param abonnement $abonnement The abonnement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(abonnement $abonnement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('abonnement_delete', array('id' => $abonnement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
