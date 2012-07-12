<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // BetaBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'BetaBundle_homepage');
            }
            return array (  '_controller' => 'Alpha\\BetaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'BetaBundle_homepage',);
        }

        if (0 === strpos($pathinfo, '/api')) {
            // index
            if (0 === strpos($pathinfo, '/api/index') && preg_match('#^/api/index(?:\\.(?P<_format>[^/]+?))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_index;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Alpha\\BetaBundle\\Controller\\DefaultController::indexAction',  '_format' => NULL,)), array('_route' => 'index'));
            }
            not_index:

            // test
            if (0 === strpos($pathinfo, '/api/test') && preg_match('#^/api/test(?:\\.(?P<_format>[^/]+?))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_test;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Alpha\\BetaBundle\\Controller\\DefaultController::testAction',  '_format' => NULL,)), array('_route' => 'test'));
            }
            not_test:

        }

        // _security_check
        if ($pathinfo === '/login_check') {
            return array('_route' => '_security_check');
        }

        // _security_logout
        if ($pathinfo === '/logout') {
            return array('_route' => '_security_logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
