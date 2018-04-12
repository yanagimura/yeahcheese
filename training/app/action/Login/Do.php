<?php
/**
 *  Login/Do.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */
require_once('adodb5/adodb.inc.php');
/**
 *  login_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_LoginDo extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
      'mailaddress' => [
            // メールアドレスフォームの定義
            'name'        => 'メールアドレス',      // Display name
            'type'        => VAR_TYPE_STRING,     // Input type
            'required'    => true,                // Required Option
            'custom'      => 'checkMailaddress',  // Optional method name
            'custom'      => 'checkDB',    　　　　// Optional method name
       ],
      'password'    => [
            // パスワードフォームの定義
            'name'        => 'パスワード',          // Display name
            'type'        => VAR_TYPE_STRING,     // Input type
            'required'    => true,                // Required Option
       ],
     );

     /**
      * チェックメソッド: メールアドレスとパスワードを確認
      *
      * @access public
      * @param string $mailaddress メールアドレス
      */
      public function checkDB($mailaddress)
      {
        $db = $this->backend->getDB();
        $rs = $db->query("SELECT * FROM users WHERE mailaddress = $1", $this->form_vars[$mailaddress]);
        if(!$rs->fetchRow()){
          $this->ae->add($mailaddress, "このメールアドレスは登録されていません", E_ERROR_INVALIDVALUE);
        } else {
          // メールアドレスが登録されていれば、パスワードを確認
          $cipherpass = hash('sha256', $this->form_vars['password']);
          $rs = $db->query("SELECT * FROM users WHERE password = $1", $cipherpass);
          if(!$rs->fetchRow()){
            $this->ae->add('password', "パスワードが一致しません", E_ERROR_INVALIDVALUE);
          }
        }
      }

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  login_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_LoginDo extends Sharepictures_ActionClass
{
    /**
     *  preprocess of login_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {

        if ($this->af->validate() > 0) {
            return 'login';
        }

        return null;
    }

    /**
     *  login_do action implementation.　セッションを開始後、ホーム画面を表示する
     *
     *  @access public
     *  @return string  ホーム画面のテンプレート
     */
    public function perform()
    {
      $mailaddress = $this->af->get('mailaddress');
      $db = $this->backend->getDB();
      $rs = $db->query("SELECT * FROM users WHERE mailaddress = $1", $mailaddress);
      $id = $rs->fetchRow()['id'];

      $sessionarray = array(
        'id'   =>   $id,
        'mailaddress'   =>   $mailaddress,
      );

      $this->session->set('login', $sessionarray);
      $this->session->start();

        return 'home';
    }
}
