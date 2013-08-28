<?php

/**
 * UsersController is a generic controller to login or logout
 * 
 * @uses AppController
 * @package Authentification
 * @version 
 * @copyright Copyright (C) 2013 Marcel Publicis All rights reserved.
 * @author Vivien Ripoche <vivien.ripoche@marcelww.com> 
 * @license 
 */
class UsersController extends AppController {

    public $components = array('Session');

    /**
     * beforeFilter 
     * 
     * @return NULL
     */
    public function beforeFilter() {
        $this->Authentification->allow('login','logout');
        parent::beforeFilter();
    }

    /**
     * admin_login 
     * 
     * @return NULL
     */
    public function admin_login() {
        if ($this->Authentification->login()) {
            $this->redirect($this->Authentification->redirect());
        } else if ( $this->request->is('post') ) {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    /**
     * admin_logout 
     * 
     * @return NULL
     */
    public function admin_logout() {
        $this->redirect($this->Authentification->logout());
    }
}
