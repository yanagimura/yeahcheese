<?php
/**
 *  Show.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  show Form implementation.　イベント一覧画面への遷移処理
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Show extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );
}

/**
 *  show action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Show extends Sharepictures_ActionClass
{
    /**
     *  preprocess of show Action.
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
     *  show action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'show';
    }
}
