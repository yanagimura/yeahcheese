<?php
/**
 *  Viewer/Login.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  viewer_login Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_ViewerLogin extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  viewer_login action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_ViewerLogin extends Sharepictures_ActionClass
{
    /**
     *  preprocess of viewer_login Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        return null;
    }

    /**
     *  viewer_login action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'viewer_login';
    }
}
