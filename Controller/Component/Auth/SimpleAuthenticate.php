<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth');

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
class SimpleAuthenticate extends FormAuthenticate {

    /**
     * _password 
     * 
     * @param string $password 
     * @return string
     */
    protected function _password($password) {
        return $password;
    }

    /**
     * _findUser 
     * 
     * @param array $conditions 
     * @param string $password 
     * @return array
     */
    protected function _findUser($conditions, $password = null) {
        $selectedUser = array();
        $usersList = Configure::read('Users');
        foreach($usersList as $user) {
          if($user['username'] == $conditions && $this->_password($user['password']) == $password) {
              $selectedUser = $user;
          }
        }
        return $selectedUser;
    }
}
