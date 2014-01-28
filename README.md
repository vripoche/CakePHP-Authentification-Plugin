CakePHP-Authentification-Plugin
==========================

Plugin used to manage authentifications easily on CakePhp 2.x

Setup
-----

You need to clone the files into an "Authentification" directory in app/Plugin.
Then, add this CakePlugin::load in the app bootstrap and active the plugin bootstrap:
```php
CakePlugin::load('Authentification', array('routes' => true));
```

Use the new SimpleForm and SimpleBasic Auth types
---------------------------------------------

These new auth systems use a config instead of "users" table, just put users in bootstrap, the role is now mandatory:
```php
Configure::write('Users', array (
    array (
        'username' => 'admin',
        'password' => 'admin',
        'role'     => 'admin'
    )
));
```

Use the Authentification Component in your AppController
--------------------------------------------------------

For example:
```php
public $components = array(
    'Authentification.Authentification' => array(
        'authenticate' => array('Authentification.SimpleForm' => array('prefix' => 'admin')),
        'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
        'logoutRedirect' => array('controller' => 'page', 'action' => 'index')
    )
);
```

Prefix must match with the role of the user, here the SimpleForm method
is used to connect the admin role to the admin section of the Web site.

Use differents auth on the same Web site
----------------------------------------

It is possible to add a Basic connection on the entire site and still keep the Form one on the admin section:
```php
public $components = array(
    'Authentification.Authentification' => array(
        'authenticate' => array(
            'Authentification.SimpleBasic',
            'Authentification.SimpleForm' => array('prefix' => 'admin')
        )
    )
);
```
