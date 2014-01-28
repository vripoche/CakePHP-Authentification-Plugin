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
    public static function findUser ( $conditions, $password = null , $authenticate = null ) {
        $selectedUser = array();
        $usersList = Configure::read( 'Users' );

        if( isset( $usersList[$authenticate] ) ) {
            $selectedUser = self::_checkUser( $usersList[$authenticate], $conditions, $password );
        } else {
            foreach ( $usersList as $user ) {
                $selectedUser = self::_checkUser( $user, $conditions, $password );
            }
        }
        CakeSession::write('Auth.User', $selectedUser);
        return $selectedUser;
    }

    private static function _checkUser( $user, $conditions, $password ) {
          $selectedUser = array();
          if ( !isset( $user['username'] ) || !isset( $user['password'] ) ) throw new CakeException('Username or password is not defined for Authentification.');
          if ( $user['username'] == $conditions && $user['password'] == $password ) {
              $selectedUser = $user;
          }
          return $selectedUser;
    }
}
