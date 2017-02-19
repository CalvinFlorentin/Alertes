<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Message;





  class MessageController extends Controller
  {
    /**
    *@Route("/message/add")
    *@Template("message/nouveau-message.html.twig")
    */
    public function creerMessageAction(Request $request){
      $nouveauMessage = new Message();
      //J'utilise un form builder pour créer un formulaire  ('form') qui correspond à une entité message
      $formBuilder = $this->get('form.factory')->createBuilder('form', $nouveauMessage);
      //J'ajout les champs que je veux dans mon futur formualaire
      $formBuilder
        ->add('libelle',    'text')
        ->add('objet',      'text')
        ->add('contenu',    'textarea')
        ->add('ajouter',      'submit')
      ;
      //Je construit le formualaire
      $form = $formBuilder->getForm();
      //// On fait le lien Requête <-> Formulaire
      $form->handleRequest($request);
      if($form->isValid()){
        $managerEntite = $this->getDoctrine()->getManager();
        $managerEntite->persist($nouveauMessage);
        $managerEntite->flush();
        return $this->render('default/index.html.twig');
      }
      return array('form' => $form->createView());
    }

    /**
    *@Route("/messages")
    *@Template("message/liste-des-messages.html.twig")
    */
    public function listerMessagesAction(){
      $messages = $this->getDoctrine()->getRepository('AppBundle:Message')->findAll();
      if(!$messages){
        //throw $this->createNotFoundException('aucun message enregistré dans la base de donnée');
      }
      return array('messages' => $messages);
    }

    /**
    *@Route("/message/{id}")
    *@Template("message/message.html.twig")
    */
    public function afficherMessageAction($id){
      $message = $this->getDoctrine()->getRepository('AppBundle:Message')->find($id);
      if(!$message){
        throw $this->createNotFoundException('aucun message enregistré dans la base de donnée ne correspond au message recherché');
      }
      return array('message' => $message);
    }





  }

 ?>
