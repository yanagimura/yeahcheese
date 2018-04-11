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
    public $form = array(
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
            'required'    => true,                // Required Option
       ],
    );

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
        /**
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'error';
        }
        $sample = $this->af->get('sample');
        */
        return null;
    }

    /**
     *  login_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'login_do';
    }
}
