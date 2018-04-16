<?php
/**
 *  Upload.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  upload Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Upload extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  upload action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Upload extends Sharepictures_ActionClass
{
    /**
     *  preprocess of upload Action.
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
     *  セッション'create'を破棄する
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $this->session->destroy('create');
        $this->session->destroy('authSession');
        return 'home';
    }
}
