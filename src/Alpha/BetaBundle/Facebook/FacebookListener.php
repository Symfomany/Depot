<?php
namespace Alpha\BetaBundle\Facebook;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Http\Firewall\AbstractAuthenticationListener;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;

/**
 * The listener is responsible for fielding requests to the firewall
 * and calling the authentication provider.
 */
class FacebookListener implements ListenerInterface
{
    protected $securityContext;
    protected $authenticationManager;

    /**
     * Injection Dependencies
     * @param SecurityContextInterface $securityContext
     * @param AuthenticationManagerInterface $authenticationManager
     * @param type $appId
     * @param type $appSecret 
     */
    public function __construct(SecurityContextInterface $securityContext,
                                AuthenticationManagerInterface $authenticationManager,
                                $appId, $appSecret)
    {
        $this->securityContext = $securityContext;
        $this->authenticationManager = $authenticationManager;
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    public function handle(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (null !== $this->securityContext->getToken()) {
            return;
        }

        // Facebook getFacebookCookie
    $cookie = $this->getFacebookCookie();
        if ($cookie) {
            $token = new FacebookUserToken();
            $token->setAccessToken($cookie['access_token']);


            // Get Grap^h Datas Me in JSON
            $content = @file_get_contents(
                    'https://graph.facebook.com/me?access_token=' .
                    $token->getAccessToken());
            if($content) {
                // New Facebook User & set Token user
                $userData = json_decode($content);
                $user = new FacebookUser($userData);
                $token->setUser($user);
                $this->securityContext->setToken($token);
            }
        }
    }
    /**
     * GET fb Cookies
     * @return null|array 
     */
    private function getFacebookCookie() {
        $args = array();
        if (!isset($_COOKIE['fbs_' . $this->appId])) {
            return;
        }
        parse_str(trim($_COOKIE['fbs_' . $this->appId], '\\"'), $args);
        ksort($args);
        $payload = '';
        foreach ($args as $key => $value) {
            if ($key != 'sig') {
                $payload .= $key . '=' . $value;
            }
        }
        if (md5($payload . $this->appSecret) != $args['sig']) {
            return null;
        }
        return $args;
    }
}