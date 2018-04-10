<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/Sharepictures_Controller.php';

ini_set('max_execution_time', 0);

Sharepictures_Controller::main_CLI('Sharepictures_Controller', '{$action_name}');
