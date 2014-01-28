<?php
App::uses('BasicAuthenticate', 'Controller/Component/Auth');
App::uses('AuthentificationStrategy', 'Authentification.Lib');

/**
 * SimpleBasicAuthenticate 
 * 
 * @uses BasicAuthenticate
 * @package Authentification
 * @version 
 * @copyright Copyright (C) 2013 Marcel Publicis All rights reserved.
 * @author Vivien Ripoche <vivien.ripoche@marcelww.com> 
 * @license 
 */
class SimpleBasicAuthenticate extends BasicAuthenticate {

    /**
     * _findUser 
     * 
     * @param array $conditions 
     * @param string $password 
     * @return array
     */
    protected function _findUser ( $conditions, $password = null ) {
        return AuthentificationStrategy::findUser( $conditions, $password, 'Authentification.SimpleBasic' );
    }
}
