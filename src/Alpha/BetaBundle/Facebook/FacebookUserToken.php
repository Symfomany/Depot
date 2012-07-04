<?php
namespace Alpha\BetaBundle\Facebook;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

/**
 * A token represents the user authentication data present in the request.
 * Once a request is authenticated, the token retains the user`s data,
 * and delivers this data across the security context.
 */
class FacebookUserToken extends AbstractToken
{
    public $accessToken;

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getCredentials()
    {
        return '';
    }
}