<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Alpha\BetaBundle\Entity\Test;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->get("doctrine.orm.entity_manager");
       $test = new Test();
       $test->setEmail('zuzu@gmail.com');
        $test->setNom('Yebox');
        $test->setPrenom('Juju');
        $em->persist($test);
        $em->flush();
//        $my = $em->getReference('BetaBundle:Test',2);
//        exit(print_r($my->getNom()));
        return $this->render('BetaBundle:Default:index.html.twig');
    }

    /**
     * GET /users/{userId} 
     *  
     * @param string $userId 
     * @return Response 
     */
    public function testAction() {
        $user = $this->get('security.context')->getToken()->getUser();

        if ($userId == $user->getId()) {
            
        }

        $view = View::create()
                ->setStatusCode(200)
                ->setData($user);

        return $this->get('fos_rest.view_handler')->handle($view);
    }

}
