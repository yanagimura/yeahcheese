<?php
/**
 *  Viewer/View.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  viewer_view Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_ViewerView extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  viewer_view action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_ViewerView extends Sharepictures_ActionClass
{
    /**
     *  preprocess of viewer_view Action.
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
     *  viewer_view action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'viewer_view';
    }

    /**
     *  セッション切れの確認
     *
     *  @access public
     *  @return string  イベント閲覧ログイン画面
     */
    public function authenticate()
    {
        if (! $this->session->isStart()) {
            return 'viewer_login';
        }
        if (is_null($this->session->get('view'))) {
            return 'viewer_login';
        }
    }
}
