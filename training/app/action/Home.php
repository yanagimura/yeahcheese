<?php
/**
 *  Home.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  home Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Home extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  home action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Home extends Sharepictures_ActionClass
{
    /**
     *  preprocess of home Action.
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
     *  home action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'home';
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

        if (is_null($this->session->get('login'))) {
            return 'login';
        }

        if (! is_null($this->session->get('create'))) {
            $this->session->remove('create');
        }
    }
}
