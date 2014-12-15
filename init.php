<?php defined('SYSPATH') or die('No direct script access.');

Route::set('admin_light', 'admin/light(/<action>)(/<id>)', array('action' => 'add', 'id' => '[0-9]+'))
    ->defaults(array(
        'controller' => 'Light',
        'action' => 'index',
        'directory' => 'Admin',
    ));



Route::set('light', 'light(/<action>)(/<id>)', array( 'id' => '[0-9]+'))
    ->defaults(array(
        'controller' => 'Light',
        'action' => 'index',
        'directory' => 'Front',
    ));

Dobby::registrationModule(Light::CAPTION, Light::NAME);