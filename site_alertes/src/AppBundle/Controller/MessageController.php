<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Message;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;




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
        try{
          $managerEntite = $this->getDoctrine()->getManager();
          $managerEntite->persist($nouveauMessage);
          $managerEntite->flush();

          $messages = $this->getDoctrine()->getRepository('AppBundle:Message')->findAll();
          return $this->render('message/liste-des-messages.html.twig',array('messages' => $messages));
        }
        catch(UniqueConstraintViolationException $e){
          echo "<div class='container text-center alert alert-danger' >Ce libellé existe déjà, veuillez en saisir un autre</div>";
        }
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
    public function afficherMessageAction(Request $request, $id){
      $message = $this->getDoctrine()->getRepository('AppBundle:Message')->find($id);
      if(!$message){
        throw $this->createNotFoundException('aucun message enregistré dans la base de donnée ne correspond au message recherché');
      }
      return array('message' => $message);
    }

    /**
    *@Route("/message/{id}/edit")
    *@Template("message/edit.html.twig")
    */
    public function majMessageAction(Request $request, $id){
      $message = $this->getDoctrine()->getRepository('AppBundle:Message')->find($id);
      if(!$message){
        throw $this->createNotFoundException('aucun message enregistré dans la base de donnée ne correspond au message recherché');
      }
      //$nouveauMessage = new Message();
      //J'utilise un form builder pour créer un formulaire  ('form') qui correspond à une entité message
      $formBuilder = $this->get('form.factory')->createBuilder('form', $message);
      //J'ajout les champs que je veux dans mon futur formualaire
      $formBuilder
        ->add('libelle',    'text')
        ->add('objet',      'text')
        ->add('contenu',    'textarea')
        ->add('modifier',      'submit')
      ;
      //Je construit le formualaire
      $form = $formBuilder->getForm();
      //// On fait le lien Requête <-> Formulaire
      $form->handleRequest($request);
      if($form->isValid()){
        try{
          $managerEntite = $this->getDoctrine()->getManager();
          $managerEntite->flush();
          $messages = $this->getDoctrine()->getRepository('AppBundle:Message')->findAll();
          return $this->render('message/liste-des-messages.html.twig',array('messages' => $messages));
        }
        catch(UniqueConstraintViolationException $e){
          echo "<div class='container text-center alert alert-danger' >Ce libellé existe déjà, veuillez en saisir un autre</div>";
        }
      }
      return array('form' => $form->createView());

    }






  }

 ?>
