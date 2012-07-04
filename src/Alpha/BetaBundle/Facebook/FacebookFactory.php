<?php

namespace Alpha\BetaBundle\Facebook;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\AbstractFactory;

/**
 * The factory is where you hook into the security component,
 * telling it the name of your provider and any configuration
 * options available
 * for it
 * To override security component, name of provider and configuration
 */

/**
 * Services used by Factory: 
 *  - facebook.security.authentication.listener 
 *  - facebook.security.authentication.provider 
 */
class FacebookFactory implements SecurityFactoryInterface {

    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint) {
        
        // Get Provider id ==> AnonymousAuthenticationProvider
        $providerId = 'security.authentication.provider.facebook.' . $id;
        
        // New decorator for provider
        $providerDD = new DefinitionDecorator(
                        'facebook.security.authentication.provider');
        
        // New definition for container : Provider + DefinitionDecorator
        $container->setDefinition($providerId, $providerDD)
                ->replaceArgument(0, new Reference($userProvider));

        // New listener for authentification mecanism
        $listenerId = 'security.authentication.listener.facebook.' . $id;
        $listenerDD = new DefinitionDecorator(
                        'facebook.security.authentication.listener');
       $container->setDefinition($listenerId, $listenerDD);

        return array($providerId, $listenerId, $defaultEntryPoint);
    }

    public function getPosition() {
        return 'pre_auth';
    }

    public function getKey() {
        return 'facebook';
    }

    public function addConfiguration(NodeDefinition $node) {
        
    }

}
