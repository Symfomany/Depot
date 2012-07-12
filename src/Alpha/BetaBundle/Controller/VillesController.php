<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Alpha\BetaBundle\Entity\Villes;
use Doctrine\Common\Util\Debug as Debug;

/**
 * Villes controller.
 *
 */
class VillesController extends Controller
{
    /**
     * Lists all Villes entities.
     *
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getEntityManager();

        return $this->render('BetaBundle:Villes:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Villes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BetaBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        return $this->render('BetaBundle:Villes:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

}
