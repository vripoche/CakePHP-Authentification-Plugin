<?php
App::uses('AuthComponent', 'Controller/Component');

/**
 * AuthentificationComponent manage allowed according to roles and prefixes.
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
     * startup 
     * 
     * @param mixed $controller 
     * @return NULL
     */
    public function startup( $controller ) {
        $prefix = $controller->params['prefix'];
        foreach( $this->authenticate as $method => $params ) {
            if( !is_array( $params ) && is_null( $prefix ) || is_array( $params ) && isset( $params['prefix'] ) && $prefix == $params['prefix'] ) {
                $this->authenticate = array();
                $this->authenticate[$method] = $params;
                break;
            }
        }
        parent::startup( $controller );
    }

    /**
     * getAuthorizeObjects 
     * 
     * @return Array
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
    public function initialize( $controller ) {
        parent::initialize( $controller );
        $deny = false;
        $allow = false;

        foreach( $this->authenticate as $method => $params ) {
            if(! is_array( $params ) ) $deny = true;
            if( is_array( $params ) && isset( $params['prefix'] ) && $controller->params['prefix'] != $params['prefix'] ) $allow = true;
        }

        if(!$deny && $allow) $this->allow();
        $role = CakeSession::read('Auth.User.role');

        if( ! is_null( $controller->params['prefix'] ) && ! is_null( $role ) && $role != $controller->params['prefix'] ) {
            throw new ForbiddenException( __("No grant access to this section") );
        }
    }
}
