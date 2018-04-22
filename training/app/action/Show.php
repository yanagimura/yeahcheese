<?php
/**
 *  Show.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  show Form implementation.　イベント一覧画面への遷移処理
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Show extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  show action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Show extends Sharepictures_ActionClass
{
    /**
     *  preprocess of show Action.
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
     *  show action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        // セッションに追加する配列
        $eventArray = [];

        //  テーブル'events'の中からログインユーザのテーブルを読み込む
        $db = $this->backend->getDB();
        $sql = "SELECT * FROM events WHERE user_id = $1";
        $eventRecord = $db->getAll($sql, $this->session->get('login')['id']);

        foreach ($eventRecord as $event) {
            //  テーブル'pictures'の中から各イベントのファイル名を読み込む
            $sql = "SELECT * FROM pictures WHERE event_id = $1";
            $pictureRecord = $db->getAll($sql, $event['id']);
            if ($pictureRecord) {
                $eventArray[] = [
                    'id'                    =>    $event['id'],
                    'title'                 =>    $event['title'],
                    'release_date'          =>    $event['release_date'],
                    'end_date'              =>    $event['end_date'],
                    'authentication_key'    =>    $event['authentication_key'],
                    'picture_array'         =>    $pictureRecord,
                    'count'                 =>    count($pictureRecord)
                ];
            }
        }
        // セッション値の追加
        $this->session->set('show', $eventArray);
        return 'show';
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
