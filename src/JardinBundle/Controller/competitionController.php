<?php

namespace JardinBundle\Controller;

use JardinBundle\Entity\competition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Competition controller.
 *
 * @Route("yes")
 */
class competitionController extends Controller
{
    /**
     * Lists all competition entities.
     *
     * @Route("/", name="yes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('JardinBundle:competition')->findAll();

        return $this->render('@Jardin/competition/index.html.twig', array(
            'competitions' => $competitions,
        ));
    }

    /**
     * Creates a new competition entity.
     *
     * @Route("/new", name="yes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $competition = new Competition();
        $form = $this->createForm('JardinBundle\Form\competitionType', $competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competition);
            $em->flush();

            return $this->redirectToRoute('yes_show', array('id' => $competition->getId()));
        }

        return $this->render('@Jardin/competition/new.html.twig', array(
            'competition' => $competition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competition entity.
     *
     * @Route("/{id}", name="yes_show")
     * @Method("GET")
     */
    public function showAction(competition $competition)
    {
        $deleteForm = $this->createDeleteForm($competition);

        return $this->render('@Jardin/competition/show.html.twig', array(
            'competition' => $competition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competition entity.
     *
     * @Route("/{id}/edit", name="yes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, competition $competition)
    {
        $deleteForm = $this->createDeleteForm($competition);
        $editForm = $this->createForm('JardinBundle\Form\competitionType', $competition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('yes_edit', array('id' => $competition->getId()));
        }

        return $this->render('@Jardin/competition/edit.html.twig', array(
            'competition' => $competition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a competition entity.
     *
     * @Route("/{id}", name="yes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, competition $competition)
    {
        $form = $this->createDeleteForm($competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competition);
            $em->flush();
        }

        return $this->redirectToRoute('yes_index');
    }

    /**
     * Creates a form to delete a competition entity.
     *
     * @param competition $competition The competition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(competition $competition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('yes_delete', array('id' => $competition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
