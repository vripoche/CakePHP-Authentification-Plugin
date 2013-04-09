<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth');
App::uses('AuthentificationStrategy', 'Authentification.Lib');

/**
 * SimpleAuthenticate use a configuration array instead of Users table
 * 
 * @uses FormAuthenticate
 * @package Authentification
 * @version 
 * @copyright Copyright (C) 2013 Marcel Publicis All rights reserved.
 * @author Vivien Ripoche <vivien.ripoche@marcelww.com> 
 * @license 
 */
class SimpleFormAuthenticate extends FormAuthenticate {

    /**
     * _findUser 
     * 
     * @param array $conditions 
     * @param string $password 
     * @return array
     */
    protected function _findUser ( $conditions, $password = null ) {
        return AuthentificationStrategy::findUser( $conditions, $password );
    }
}