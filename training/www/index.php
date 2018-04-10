<?php

require_once dirname(__FILE__) . '/../app/Sharepictures_Controller.php';

/**
 * If you want to enable the UrlHandler, comment in following line,
 * and then you have to modify $action_map on app/Sharepictures_UrlHandler.php .
 *
 */
// $_SERVER['URL_HANDLER'] = 'index';

/**
 * Run application.
 */
Sharepictures_Controller::main('Sharepictures_Controller', 'index');

