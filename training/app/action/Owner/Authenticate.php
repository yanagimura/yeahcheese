<?php
/**
 *  Owner/Authenticate.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  owner_authenticate Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_OwnerAuthenticate extends Sharepictures_ActionForm
{
    const NO_VARIABLE_KEY_LENGTH = 6;
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [
        'authentication_key'  =>  [
            'name'        =>      '認証キー',
            'type'        =>      VAR_TYPE_STRING,
            'required'    =>      'true',
            'regexp'      =>      '/\A[a-zA-Z0-9]+\z/',
            'custom'      =>      'checkNoVariableLength',
        ],
    ];
    /**
     *  不可変長の認証キーのバリデーション
     *
     *  @access public
     *  @param string 認証キー
     */
    public function checkNoVariableLength($authkey)
    {
        if (strlen($this->form_vars[$authkey]) !== self::NO_VARIABLE_KEY_LENGTH) {
            $this->ae->add($authkey, '認証キーを正しく入力してください', E_FORM_INVALIDVALUE);
        }
    }
}

/**
 *  owner_authenticate action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_OwnerAuthenticate extends Sharepictures_ActionClass
{
    /**
     *  preprocess of owner_authenticate Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if(! Ethna_Util::isCsrfSafe()) {
            return 'viewer_login';
        }
        if ($this->af->validate() > 0) {
            return 'viewer_login';
        }
        return null;
    }

    /**
     *  Viewerのセッションを開始する
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $sql = "SELECT * FROM events WHERE authentication_key = ?";
        $eventRow = $db->getRow($sql, $this->af->get('authentication_key'));

        if (! $eventRow) {
            $this->ae->add('authentication_key', "認証キーを正しく入力してください", E_FORM_INVALIDVALUE);
            return 'viewer_login';
        }

        if (new DateTime($eventRow['end_date']) < new DateTime()) {
            $this->ae->add('authentication_key', "有効期限切れです", E_FORM_INVALIDVALUE);
            return 'viewer_login';
        }

        if (new DateTime($eventRow['release_date']) > new DateTime()) {
            $this->ae->add('authentication_key', "まだ公開されていないイベントです", E_FORM_INVALIDVALUE);
            return 'viewer_login';
        }

        $sql = "SELECT * FROM pictures WHERE event_id = ?";
        $pictureRow = $db->getAll($sql, $eventRow['id']);
        $this->session->start();
        $this->session->set('view', [
          'pictureArray'    =>    $pictureRow,
          'event'           =>    $eventRow,
        ]);

        return 'viewer_view';
    }
}
