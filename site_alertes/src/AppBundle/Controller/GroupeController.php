<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Groupe;
use AppBundle\Form\GroupeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GroupeController extends Controller {

    /**
     * @Route("/groupe")
     * @Template("groupe/listerGroupes.html.twig")
     */
    public function indexAction() {
        $groupes = $this->getDoctrine()->getRepository('AppBundle:Groupe')->findAll();
        if(!$groupes) {
            throw $this->createNotFoundException('Il n\'exite aucun groupe.');
        }
        return array('groupes' => $groupes);
    }

    /**
     * @Route("/groupe/{id}")
     * @Template("groupe/afficherGroupe.html.twig")
     */
    public function afficherGroupeAction($id) {
        $groupe = $this->getDoctrine()->getRepository('AppBundle:Groupe')->find($id);
        if(!$groupe) {
            throw $this->createNotFoundException('Aucun groupe ne correspond à cet identifiant.');
        }
        return array('groupe' => $groupe);
    }

    /**
     * @Route("/ajout-groupe")
     * @Template("groupe/creerGroupe.html.twig")
     */
    public function ajouterGroupeAction(Request $request) {
        $groupe = new Groupe();
        $form = $this->createForm(new GroupeType(), $groupe);
        if ('POST' == $request->getMethod()) {
            $form->submit($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($groupe);
                $em->flush();

                return $this->redirect($this->generateUrl('app_groupe_index'));
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/modif-groupe/{id}")
     * @Template("groupe/supprimerGroupe.html.twig")
     */
    public function modifierGroupeAction($id) {
        $annonce = $this->getDoctrine()->getRepository('AppBundle:Groupe')->find($id);
        if(!$annonce) {
            throw $this->createNotFoundException('Aucun groupe ne correspond à cet identifiant.');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->
        $em->flush();
        return array();
    }

    /**
     * @Route("/suppr-groupe/{id}")
     * @Template("groupe/supprimerGroupe.html.twig")
     */
    public function supprimerGroupeAction($id) {
        $annonce = $this->getDoctrine()->getRepository('AppBundle:Groupe')->find($id);
        if(!$annonce) {
            throw $this->createNotFoundException('Aucun groupe ne correspond à cet identifiant.');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($annonce);
        $em->flush();
        return array();
    }
}
