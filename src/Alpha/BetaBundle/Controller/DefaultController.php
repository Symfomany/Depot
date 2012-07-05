<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {

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
