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
    public $loginAction = array(
        'controller' => 'users',
        'action' => 'login',
        'plugin' => 'authentification'
    );
    
    public $authenticate = array('all' => array(
		'userModel' => 'Authentification.User'
    ));
}
