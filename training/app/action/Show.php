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
        //  テーブル'events'の中からログインユーザのテーブルを読み込む

        $db = $this->backend->getDB();
        $eventArray = [];
        $sql = "SELECT * FROM events WHERE user_id = $1";
        $rs = $db->query($sql, $this->session->get('login')['id']);

        while ($event = $rs->fetchRow()) {
            $pictureArray = [];
            //  テーブル'pictures'の中から各イベントのファイル名を読み込む
            $sql = "SELECT * FROM pictures WHERE event_id = $1";
            $prs = $db->query($sql, $event['id']);
            while ($picture = $prs->fetchRow()) {
                $pictureArray[] = $picture['filename'];
            }
            if($pictureArray){
              $eventArray[] = [
              'title'   =>    $event['title'],
              'release_date'    =>    $event['release_date'],
              'end_date'    =>    $event['end_date'],
              'authentication_key'    =>  $event['authentication_key'],
              'picture_array'   =>    $pictureArray,
              'count'   =>    count($pictureArray)
            ];
            }
        }
        // セッションの開始
        $this->session->set('show', $eventArray);
        $this->session->start();
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
        if (!$this->session->isStart('login')) {
            return 'login';
        }
    }
}
