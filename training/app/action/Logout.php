<?php
/**
 *  Logout.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  logout Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Logout extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );
}

/**
 *  logout action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Logout extends Sharepictures_ActionClass
{
    /**
     *  preprocess of logout Action.
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
     *  logout action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
      $this->session->destroy();
        return 'login';
    }
}
