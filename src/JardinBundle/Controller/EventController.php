<?php


namespace JardinBundle\Controller;



use JardinBundle\Entity\evenement;
use JardinBundle\Form\evenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /*public function afficherAction(Request $request)
    {


        $username =(string) $this->getUser();
        $user = $this->getUser();
        var_dump($user->getId());
        $em = $this->getDoctrine()->getManager();
        //$user = $em->getRepository('UserBundle:User')->findOneBy(array('username'=>$username));

        //var_dump($user->getId());
        $event= new evenement();
        $oldevent=new evenement();
        $id= $request->get('id');
        if($id != null)
        {
            //return $this->redirectToRoute('acceuil_SuperAdmin_homepage');
            $em=$this->getDoctrine()->getManager();
            $oldevent=$em->getRepository('JardinBundle:evenement')->find($id);
        }
        $Form=$this->createForm(evenementType::class,$event);
        $Form->handleRequest($request);

        if($Form->isValid())
        {
            if ($event->getImage() != null)
            {
                $file = $event->getImage();
                $fileName ='';

                if ($oldevent->getImage() != null)
                {
                    $fileName= $oldevent->getImage();
                }
                else
                    {
                        // Generate a unique name for the file before saving it
                        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                    }
                $file->move($this->getParameter('events_photos_directory'), $fileName);
                $event->setPhoto($fileName);

            }
            else
                {
                    $flag = $request->get('flag');
                    if ( $flag != "")
                    {
                    $event->setPhoto($oldevent->getPhoto() );
                    }
                        else
                        {
                            $event->setPhoto(null);
                            if ($oldevent->getPhoto() != null)
                            {
                            $fs = new Filesystem();
                            $fs->remove($this->getParameter('events_photos_directory'), $oldevent->getPhoto());
                            }

                         }
                }




            // Move the file to the directory where photoes are stored
            $oldevent->setImage($event->getImage());
            $oldevent->setTitre($event->getTitre());
            $oldevent->setDescription($event->getDescription());
            $oldevent->setType($event->getType());
            $oldevent->setDateDebut($event->getDateDebut());
            $oldevent->setDateFin($event->getDateFin());
            $em=$this->getDoctrine()->getManager();
            $em->persist($oldevent); //insert into
            $em->flush(); //push


            unset($event);
            unset($Form);
            $event = new \JardinBundle\Entity\evenement();
            $Form = $this->createForm(evenementType::class,$event);
        }
            $events=$this->getDoctrine()
                ->getRepository('JardinBundle:evenement')->findAll();
        return $this->render("JardinBundle:Parent:index.html.twig",
            array('events'=>$events,'forms'=>$Form->createView(),'username'=>$username) );
        }*/


}