<?php
/**
 *  Hide.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  hide Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Hide extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  hide action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Hide extends Sharepictures_ActionClass
{
    /**
     *  preprocess of hide Action.
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
     *  hide action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $this->session->remove('show');
        return 'home';
    }
}
