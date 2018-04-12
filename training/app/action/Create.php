<?php
/**
 *  Create.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  create Form implementation. イベント作成処理画面への遷移処理
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Create extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );

}

/**
 *  create action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Create extends Sharepictures_ActionClass
{
    /**
     *  preprocess of create Action.
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
     *  create action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'create';
    }
}
