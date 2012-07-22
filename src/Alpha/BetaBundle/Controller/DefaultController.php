<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Imagine\Gd\Imagine;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $imagine = new \Imagine\Gd\Imagine();
         $imagine->open('./uploads/Desert.jpg')
                 ->resize(new \Imagine\Image\Box(500,250))
                 ->save('./uploads/ok.jpg');
        return $this->render('BetaBundle:Default:index.html.twig');
    }
}
