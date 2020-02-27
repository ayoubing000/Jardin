<?php


namespace JardinBundle\Controller;
use JardinBundle\Entity\contrat;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class BundleController extends Controller
{
    public function pdfAction(contrat $contrat)
    {
        $html = $this->renderView(':contrat:show.html.twig', array(
        'contrat'  => $contrat));


        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html,array(
                'margin-top' => '30',
            'margin-bottom' => '30',
            )),
            'file.pdf',
            'application/pdf',
            'inline',
            '200'
        );
    }
}