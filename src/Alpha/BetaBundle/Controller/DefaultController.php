<?php

namespace Alpha\BetaBundle\Controller;


use Imagine\Gd\Imagine;
use Alpha\BetaBundle\Entity\Test;
use Alpha\BetaBundle\Entity\Villes;
use Doctrine\Common\Util\Debug as Debug;

class DefaultController extends Controller {

    
    public function indexAction()
    {
        $imagine = new \Imagine\Gd\Imagine();
         $imagine->open('./uploads/Desert.jpg')
                 ->resize(new \Imagine\Image\Box(500,250))
                 ->save('./uploads/ok.jpg');
//    +Tri par geoloc distance GEO()
    }
    
}
