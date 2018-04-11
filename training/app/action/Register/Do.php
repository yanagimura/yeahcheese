<?php

require_once('adodb5/adodb.inc.php');

/**
 *  Register/Do.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  register_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_RegisterDo extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
       /*
        *  TODO: Write form definition which this action uses.
        *  @see http://ethna.jp/ethna-document-dev_guide-form.html
        *
        *  Example(You can omit all elements except for "type" one) :
        *
        *  'sample' => array(
        *      // Form definition
        *      'type'        => VAR_TYPE_INT,    // Input type
        *      'form_type'   => FORM_TYPE_TEXT,  // Form type
        *      'name'        => 'Sample',        // Display name
        *
        *      //  Validator (executes Validator by written order.)
        *      'required'    => true,            // Required Option(true/false)
        *      'min'         => null,            // Minimum value
        *      'max'         => null,            // Maximum value
        *      'regexp'      => null,            // String by Regexp
        *
        *      //  Filter
        *      'filter'      => 'sample',        // Optional Input filter to convert input
        *      'custom'      => null,            // Optional method name which
        *                                        // is defined in this(parent) class.
        *  ),
        */
         'mailaddress' => [
               // メールアドレスフォームの定義
               'name'        => 'メールアドレス',      // Display name
               'type'        => VAR_TYPE_STRING,     // Input type
               'required'    => true,                // Required Option
               'custom'      => 'checkMailaddress',  // Optional method name
               'custom'      => 'checkDBAddress',    // Optional method name
          ],
        'password'    => [
               // パスワードフォームの定義
               'name'        => 'パスワード',          // Display name
               'type'        => VAR_TYPE_STRING,     // Input type
               'min'         => 6,
               'regexp'      => '/^[a-z0-9]+$/',
               'required'    => true,                // Required Option
          ],
        'password_confirm'    => [
               // 確認用パスワードフォームの定義
               'name'        => '確認用パスワード',
               'type'        => VAR_TYPE_STRING,
               'required'    => true,
               'custom'      => 'checkPassword',
          ],
    );


    /**
     * チェックメソッド: パスワード一致確認
     *
     * @access public
     * @param string $password 確認用パスワード
     */
     function checkPassword($password)
     {
       if($this->form_vars[$password] !== $this->form_vars['password']){
         $this->ae->add($password, "パスワードが一致していません", E_ERROR_INVALIDVALUE);
       }
     }

     /**
      * チェックメソッド: メールアドレスの重複確認
      *
      * @access public
      * @param string $mailaddress メールアドレス
      */
      function checkDBAddress($mailaddress)
      {
        $db = $this->backend->getDB();
        $rs = $db->query("SELECT * FROM users WHERE mailaddress = $1", $this->form_vars[$mailaddress]);
        if($rs->fetchRow()){
          $this->ae->add($mailaddress, "このメールアドレスは登録済みです", E_ERROR_INVALIDVALUE);
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
 *  register_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_RegisterDo extends Sharepictures_ActionClass
{
    /**
     *  preprocess of register_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {

        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'register';
        }
        // $sample = $this->af->get('sample');

        return null;
    }

    /**
     *  register_do action implementation.
     *　データテーブル"users"に行の追加を行う
     *  @access public
     *  @return string  ログイン画面のテンプレート
     */
    public function perform()
    {
      $db = $this->backend->getDB();

      $mail = $this->af->get('mailaddress');
      $pass = $this->af->get('password');
      $cipherpass = hash('sha256', $pass);

      $db->query("INSERT INTO users(mailaddress,password) VALUES($1, $2)", [$mail, $cipherpass]);

      return 'login';
    }
}
