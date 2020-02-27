<?php

namespace JardinBundle\Controller;

use JardinBundle\Entity\emploi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Emploi controller.
 *
 */
class emploiController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $emplois = $em->getRepository('JardinBundle:emploi')->findAll();

        return $this->render('emploi/index.html.twig', array(
            'emplois' => $emplois,
        ));
    }


    public function newAction(Request $request)
    {

        $emploi = new emploi();
        $form = $this->createForm('JardinBundle\Form\emploiType', $emploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($emploi);

            $em->flush();


            return $this->redirectToRoute('emploi_show', array('id' => $emploi->getId()));
        }

        return $this->render('emploi/new.html.twig', array(
            'emploi' => $emploi,
            'form' => $form->createView(),
        ));
    }


    public function showAction(emploi $emploi)
    {
        $deleteForm = $this->createDeleteForm($emploi);

        return $this->render('emploi/show.html.twig', array(
            'emploi' => $emploi,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function editAction(Request $request, emploi $emploi)
    {
        $deleteForm = $this->createDeleteForm($emploi);
        $editForm = $this->createForm('JardinBundle\Form\emploiType', $emploi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('emploi_edit', array('id' => $emploi->getId()));
        }

        return $this->render('emploi/edit.html.twig', array(
            'emploi' => $emploi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function deleteAction(Request $request, emploi $emploi)
    {
        $form = $this->createDeleteForm($emploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emploi);
            $em->flush();
        }

        return $this->redirectToRoute('emploi_index');
    }

    /**
     * Creates a form to delete a emploi entity.
     *
     * @param emploi $emploi The emploi entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(emploi $emploi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emploi_delete', array('id' => $emploi->getId())))
            ->setMethod('DELETE')
            ->getForm()

        ;

    }

    public function findiAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        if ($request->isMethod("post")){
        $id=$request->get('id');
        $emplo=$em->getRepository("JardinBundle:emploi")->findid($id);
        return $this->render("JardinBundle:recherche:RechPat.html.twig",array("emplois"=>$emplo));
    }
        else{
            return new Response("xxx");
        }

    }
}