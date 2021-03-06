<?php
/**
 *  Login/Do.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

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
    const MIN_LENGTH = 6;
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
            'min'         => self::MIN_LENGTH,
       ],
     ];
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
            $this->session->start();
            $sessionarray = [
                'id'   =>   $rs['id'],
                'mailaddress'   =>   $rs['mailaddress'],
              ];
            $this->session->set('login', $sessionarray);
      }
        return 'home';
    }
}
