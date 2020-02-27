<?php

namespace JardinBundle\Controller;

use JardinBundle\Entity\contrat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contrat controller.
 *
 */
class contratController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contrats = $em->getRepository('JardinBundle:contrat')->findAll();

        return $this->render('contrat/index.html.twig', array(
            'contrats' => $contrats,
        ));
    }


    public function newAction(Request $request)
    {
        $contrat = new Contrat();
        $form = $this->createForm('JardinBundle\Form\contratType', $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()  ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrat);
            $em->flush();

            return $this->redirectToRoute('contrat_show', array('id' => $contrat->getId()));
        }

        return $this->render('contrat/new.html.twig', array(
            'contrat' => $contrat,
            'form' => $form->createView(),
        ));
    }


    public function showAction(contrat $contrat)
    {
        $deleteForm = $this->createDeleteForm($contrat);

        return $this->render('contrat/show.html.twig', array(
            'contrat' => $contrat,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function editAction(Request $request, contrat $contrat)
    {
        $deleteForm = $this->createDeleteForm($contrat);
        $editForm = $this->createForm('JardinBundle\Form\contratType', $contrat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contrat_edit', array('id' => $contrat->getId()));
        }

        return $this->render('contrat/edit.html.twig', array(
            'contrat' => $contrat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function deleteAction(Request $request, contrat $contrat)
    {
        $form = $this->createDeleteForm($contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contrat);
            $em->flush();
        }

        return $this->redirectToRoute('contrat_index');
    }

    /**
     * Creates a form to delete a contrat entity.
     *
     * @param contrat $contrat The contrat entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(contrat $contrat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contrat_delete', array('id' => $contrat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
