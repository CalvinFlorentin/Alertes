<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Protocole;
use AppBundle\Entity\ProtocoleInstruction;
use AppBundle\Entity\Instruction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Protocole controller.
 *
 * @Route("protocole")
 */
class ProtocoleController extends Controller
{
    /**
     * Displays procotocole's menu
     *
     * @Route("/", name="protocole_index")
     */
    public function indexAction()
    {
        return $this->render('protocole/index.html.twig');
    }

    /**
     * Lists all protocoles entities.
     *
     * @Route("/lists", name="protocole_list")
     * @Method("GET")
     */
    public function showAllAction() {
        $em = $this->getDoctrine()->getManager();

        $protocoles = $em->getRepository('AppBundle:Protocole')->findAll();
        /*$protocoleInstruction = $em->getRepository('AppBundle:ProtocoleInstruction')->findAll();
        $instructions = $em->getRepository('AppBundle:Instruction')->findAll();*/

        return $this->render('protocole/listAll.html.twig', array(
            'protocoles' => $protocoles,
        ));

    }

    /**
     * Creates a new instruction entity.
     *
     * @Route("/new", name="protocole_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $protocole = new ProtocoleInstruction();
        $form = $this->createForm('AppBundle\Form\ProtocoleInstructionType', $protocole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($protocole);
            $em->flush($protocole);

            return $this->redirectToRoute('protocole_show', array('id' => $protocole->getIdProtocole()));
        }

        return $this->render('protocole/new.html.twig', array(
            'protocole' => $protocole,
            'form' => $form->createView(),
        ));

        return $this->render('protocole/new.html.twig');
    }

    /**
     * Finds and displays a protocole entity.
     *
     * @Route("/{id}", name="protocole_show")
     * @Method("GET")
     */
    public function showAction() {
        return $this->render('protocole/show.html.twig');
    }

    /**
     * Displays a form to edit an existing protocole entity.
     *
     * @Route("/{id}/edit", name="protocole_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction() {
        return $this->render('protocole/edit.html.twig');
    }


}
