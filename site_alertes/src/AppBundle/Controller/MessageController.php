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
    public function créerMessage(Request $request){
      $nouveauMessage = new Message();
      //J'utilise un form builder pour créer un formulaire  ('form') qui correspond à une entité message
      $formBuilder = $this->get('form.factory')->createBuilder('form', $nouveauMessage);
      //J'ajout les champs que je veux dans mon futur formualaire
      $formBuilder
        ->add('objet',      'text')
        ->add('contenu',    'textarea')
        ->add('créer',      'submit')
      ;
      //Je construit le formualaire
      $form = $formBuilder->getForm();
      //// On fait le lien Requête <-> Formulaire
      $form->handleRequest($request);
      if($form->isValid()){
        $managerEntite = $this->getDoctrine()->getManager();
        $managerEntite->persist($nouveauMessage);
        $managerEntite->flush();
        //rediriger sur l'acueil quand on en aura un
      }
      return array('form' => $form->createView());
    }




      public function indexAction(Request $request)
      {
          return $this->render('index.html.twig');
      }
  }

 ?>
