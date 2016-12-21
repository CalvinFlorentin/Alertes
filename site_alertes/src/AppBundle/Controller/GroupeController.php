<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GroupeController extends Controller {

    public function indexAction($name) {
        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/groupe/add")
     * @Template("groupe/addGroupe.html.twig")
     */
    public function ajouterAction(Request $request) {
        $annonce = new Annonce();
        $form = $this->createForm(new AnnonceType(), $annonce);
        if ('POST' == $request->getMethod()) {
            $form->submit($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($annonce);
                $em->flush();

                return $this->redirect($this->generateUrl('app_annonce_listerannonces'));
            }
        }
        return array('form' => $form->createView());
    }
}
