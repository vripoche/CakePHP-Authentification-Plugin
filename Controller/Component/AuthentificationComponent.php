<?php
App::uses('AuthComponent', 'Controller/Component');

/**
 * AuthentificationComponent is just the plugin Auth child
 * 
 * @uses AuthComponent
 * @package Authentification
 * @version 
 * @copyright Copyright (C) 2013 Marcel Publicis All rights reserved.
 * @author Vivien Ripoche <vivien.ripoche@marcelww.com> 
 * @license 
 */
class AuthentificationComponent extends AuthComponent
{

    /**
     * loginAction 
     * 
     * @var array
     */
    public $loginAction = array(
        'controller' => 'users',
        'action' => 'login',
        'plugin' => 'authentification'
    );

    /**
     * authenticate 
     * 
     * @var string
     */
    public $authenticate = array('all' => array(
        'userModel' => 'Authentification.User'
    ));

    /**
     * getAuthorizeObjects 
     * 
     * @return NULL
     */
    public function getAuthorizeObjects() {
        return $this->_authorizeObjects;
    }

    /**
     * initialize 
     * 
     * @param mixed $controller 
     * @return NULL
     */
    public function initialize($controller) {
        parent::initialize($controller);
        if ($controller->params['prefix'] != 'admin' && !in_array('Authentification.SimpleBasic', $this->authenticate)) {
            $this->allow();
        }
    }
}
