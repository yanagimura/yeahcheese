<?php
/**
 *  Confirm.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  confirm Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Confirm extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [

    ];
}

/**
 *  confirm action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Confirm extends Sharepictures_ActionClass
{
    /**
     *  preprocess of confirm Action.
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
     *  データベースに書き込み、
     *  セッション'create'に認証キーを追加、upload.tplを表示
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'confirm';
    }

    /**
     *  セッション切れの確認、
     *
     *  @access public
     *  @return string イベント作成画面のテンプレート
     */
    public function authenticate()
    {
        if (!$this->session->isStart('create')) {
            return 'create';
        }
    }
}
