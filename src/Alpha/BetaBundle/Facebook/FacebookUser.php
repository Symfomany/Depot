<?php

namespace Alpha\BetaBundle\Facebook;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User by Facebook datas 
 */
class FacebookUser {

    /**
     * Get User FB Get DATAS store
     * @param type $data 
     */
    public function __construct($data) {
        $this->id = $data->id;
        $this->username = $data->first_name;
    }

    /**
     * Get Username
     * @return type 
     */
    public function getUsername() {
        return $this->username;
    }
    
    /**
     *  Get Id
     * @return type 
     */
    public function getId() {
        return $this->id;
    }

    /**
     *All Serialize
     * @return type 
     */
    public function __toString() {
        return serialize($this);
    }

}
