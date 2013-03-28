CakePHP-Authentification-Plugin
==========================

Plugin used to manage easily authentifications on CakePhp 2.x

Setup
-----

You need to clone the files into an "Authentification" directory in app/Plugin.
Then, add this CakePlugin::load in the app bootstrap and active the plugin bootstrap:

> CakePlugin::load('Authentification', array('routes' => true));

Use the new Simple and SimpleBasic Auth types
---------------------------------------------

These new auth systems use a config instead of "users" table, just put users in bootstrap:

>    Configure::write('Users', array (
>        array (
>            'username' => 'admin',
>            'password' => 'admin'
>        )
>    ));

Use the Authentification Component in your AppController
--------------------------------------------------------

For example:

>    public $components = array(
>        'Authentification.Authentification' => array(
>            'authenticate' => array('Authentification.Simple'),
>            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
>            'logoutRedirect' => array('controller' => 'page', 'action' => 'index')
>        )
>    );