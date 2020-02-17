<?php


namespace JardinBundle\Controller;


use JardinBundle\Entity\Commentaire;
use JardinBundle\Entity\Evenement;
use JardinBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommentaireController extends Controller
{
public function addCommentAction(Request $request, $id){

    $username =(string) $this->getUser();

    $em=$this->getDoctrine()->getManager();
    $currentUser = $em->getRepository(User::class)->findOneBy(array('username'=>$username));

    $text = $request->get('text');

    $comment =new Commentaire();
    $comment->setContenu($text);
    $comment->setDate(new \DateTime());

    $event = $em->getRepository(Evenement::class)->find($id);

    $comment->setEvenement($event);
    $comment->setUser($currentUser);

    $em->persist($comment);
    $em->flush();

    return $this->redirectToRoute('details_evenement',array('id' => $id));
 }

    public function deleteCommentAction( $id){
        $em=$this->getDoctrine()->getManager();
        $commentaire = $em->getRepository(Commentaire::class)->find($id);
        $idEvenement = $commentaire->getEvenement()->getId();
        $em->remove($commentaire);
        $em->flush();
        return $this->redirectToRoute('details_evenement',array('id' => $idEvenement));
    }

}

