<?php
/**
 *  Viewer/Logout.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  viewer_logout Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_ViewerLogout extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  viewer_logout action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_ViewerLogout extends Sharepictures_ActionClass
{
    /**
     *  preprocess of viewer_logout Action.
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
     *  viewer_logout action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $this->session->destroy();
        return 'viewer_login';
    }
}
