<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
         
        return $this->render('BetaBundle:Default:index.html.twig');
    }
}
