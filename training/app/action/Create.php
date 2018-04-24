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
    public $form = [
      'title'       => [
      //  イベント名フォームの定義
        'name'            =>    'タイトル',
        'type'            =>    VAR_TYPE_STRING,
    ],
    'release_date' => [
      //  公開開始日フォームの定義
        'name'            =>    '公開開始日',
        'type'            =>    VAR_TYPE_DATETIME,
    ],
    'end_date'     => [
      //  公開終了日フォームの定義
        'name'            =>    '公開終了日',
        'type'            =>    VAR_TYPE_DATETIME,
    ],
  ];
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
     *  @return string  イベント作成画面のテンプレート
     */
    public function perform()
    {
        Ethna_Util::setCsrfID();
        return 'create';
    }

    /**
     *  セッション切れの確認
     *
     *  @access public
     *  @return string  ログイン画面のテンプレート
     */
    public function authenticate()
    {
        if (!$this->session->isStart()) {
            return 'login';
        }
    }
}
