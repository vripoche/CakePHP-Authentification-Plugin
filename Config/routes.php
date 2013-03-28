<?php

Router::connect('/authentification/:controller/:action/*', array('admin' => true, 'plugin' => 'authentification'));