<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Imagine\Gd\Imagine;
use Imagine\Image\Point;
use Imagine\Image\Box;

use Alpha\BetaBundle\Entity\Test;
use Alpha\BetaBundle\Entity\Villes;
use Doctrine\Common\Util\Debug as Debug;
use Imagine\Image\ImageInterface;

//http://www.slideshare.net/avalanche123/introduction-toimagine
class DefaultController extends Controller {
    
    public function indexAction()
    {
        $imagine = new \Imagine\Gd\Imagine();
        $imagine2 = clone $imagine;
        $imagine3 = clone $imagine;
//         $imagine->open('./uploads/Desert.jpg')
//                 ->resize(new \Imagine\Image\Box(500,250))
//                 ->save('./uploads/ok.jpg');
//         $imagine2->open('./uploads/Desert.jpg')->save('./uploads/la.jpg', array('quality' => 20));
         
         $options = array(
                 'resolution-units' => ImageInterface::RESOLUTION_PIXELSPERINCH,
                'resolution-x' => 300,
                'resolution-y' => 300,
                'quality' => 100,
            );

            $imagine3->open('./uploads/Desert.jpg')->save('./uploads/la.jpg', $options);
            $img = $imagine2->open('./uploads/Desert.jpg');
            $size =$img->getSize();
            $copy = $img->copy();
            //->flipVertically()
            //->applyMask() Fill\Gradiant for transparence
            //->rotate(angle,bg)
            //thumbnail()
            
//            Possibilités de foreach for batch process
//            foreach(glob(/fgdfg/dfg/dfgfg/*.jpg) as $fl)){}
            
            
            
        return $this->render('BetaBundle:Default:index.html.twig');
    }
    
}
