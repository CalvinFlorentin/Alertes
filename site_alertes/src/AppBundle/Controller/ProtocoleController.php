<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Instruction controller.
 *
 * @Route("protocole")
 */
class ProtocoleController extends Controller
{
    /**
     * @Route("/", name="protocole_index")
     */
    public function indexAction()
    {
        return $this->render('protocole/index.html.twig');
    }
}
