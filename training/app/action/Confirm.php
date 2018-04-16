<?php
/**
 *  Confirm.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */
require_once('adodb5/adodb.inc.php');
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
     *  セッション'create'に認証キーを追加、データベースに書き込み、
     *  DBupload.tplを表示
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $str = array_merge(range('a','z'), range('0', '9'), range('A', 'Z'));
        $authkey = null;
        for ($i = 0; $i < 6; $i++) {
            $authkey .= $str[rand(0, count($str) - 1)];
        }

        $db = $this->backend->getDB();

        // eventのレコードを追加する
        $sql = "INSERT INTO events(title, user_id, release_date, end_date, authentication_key) VALUES($1, $2, $3, $4, $5)";
        $db->query($sql, [$this->session->get('create')['title'], $this->session->get('login')['id'],
          $this->session->get('create')['release_date'], $this->session->get('create')['end_date'], $authkey]);

        // 最後に追加されたレコードを取得する
        $sql = "SELECT * FROM events ORDER BY id DESC LIMIT 1";
        $eventID = $db->getRow($sql)['id'];

        //  picturesのレコードを追加する
        $sql = "INSERT INTO pictures(filename, event_id) VALUES($1, $2)";
        foreach($this->session->get('create')['picture_array'] as $filename){
          $db->query($sql, [$filename, $eventID]);
        }

        //  認証キー用のセッションを開始
        $authSession = [
            'authentication_key'   =>   $authkey,
          ];

        $this->session->set('authSession', $authSession);
        $this->session->start();

        return 'upload';
    }

    /**
     *  セッション切れの確認、
     *
     *  @access public
     *  @return string イベント作成画面のテンプレートまたはログイン画面のテンプレート
     */
    public function authenticate()
    {
        if (!$this->session->isStart('create')) {
            return 'create';
        }

        if (!$this->session->isStart('login')) {
            return 'login';
        }

    }
}
