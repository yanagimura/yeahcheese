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
    public $form = [
      'mailaddress' => [
            // メールアドレスフォームの定義
            'name'        => 'メールアドレス',      // Display name
            'type'        => VAR_TYPE_STRING,     // Input type
            'required'    => true,                // Required Option
            'custom'      => 'checkMailaddress',  // Optional method name
       ],
      'password'    => [
            // パスワードフォームの定義
            'name'        => 'パスワード',          // Display name
            'type'        => VAR_TYPE_STRING,     // Input type
            'required'    => true,                // Required Option
       ],
     ];

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
     *  login_do action implementation. DBと一致すれば、セッションを開始
     *
     *  @access public
     *  @return string  ホーム画面のテンプレート
     */
    public function perform()
    {
        $sql = "SELECT * FROM users WHERE mailaddress = ? AND password = ?";
        $rs = $this->backend->getDB()->getRow($sql, [
            $this->af->get('mailaddress'),
            hash('sha256', $this->af->get('password')),
        ]);

        if (!$rs) {
            $this->ae->add('mailaddress', "メールアドレスまたはパスワードが間違っています", E_FORM_INVALIDVALUE);
            return 'login';
        } else {
            $id = $rs['id'];

            $sessionarray = [
                'id'   =>   $id,
                'mailaddress'   =>   $mailaddress,
              ];

            $this->session->set('login', $sessionarray);
            $this->session->start();
        }
        return 'home';
    }
}
