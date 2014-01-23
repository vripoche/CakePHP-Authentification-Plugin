<?php

/**
 * AUthentificationStrategy 
 * 
 * @package Authentification
 * @version 
 * @copyright Copyright (C) 2013 Marcel Publicis All rights reserved.
 * @author Vivien Ripoche <vivien.ripoche@marcelww.com> 
 * @license 
 */
class AuthentificationStrategy {

    /**
     * findUser 
     * 
     * @param array $conditions 
     * @param string $password 
     * @return array
     */
    public static function findUser ( $conditions, $password = null ) {
        $selectedUser = array();
        $usersList = Configure::read( 'Users' );
        foreach ( $usersList as $user ) {
          if ( !isset( $user['username'] ) || !isset( $user['password'] ) ) throw new CakeException('Username or password is not defined for Authentification.');
          if ( $user['username'] == $conditions && $user['password'] == $password ) {
              $selectedUser = $user;
          }
        }
        return $selectedUser;
    }
}