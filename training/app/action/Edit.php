<?php
/**
 *  Edit.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  edit Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Edit extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    const MIN_LENGTH = 3;
    const MAX_LENGTH = 20;
    public $form = [
        'eventno'   =>    [
            'type'    =>    VAR_TYPE_STRING,
        ],
        'title'   =>    [
            'name'    =>    'タイトル',
            'type'    =>    VAR_TYPE_STRING,
            'form_type'   =>    FORM_TYPE_TEXT,
            'required'    =>    'true',
            'min'   =>    self::MIN_LENGTH,
            'max'   =>    self::MAX_LENGTH,
        ],
        'release_date'    =>    [
            'name'    =>    '公開開始日',
            'type'    =>    VAR_TYPE_DATE,
            'required'    =>    'true',
        ],
        'end_date'    =>    [
            'name'    =>    '公開終了日',
            'type'    =>    VAR_TYPE_DATE,
            'required'    =>    'true',
        ],
        'picture_array'   =>    [
            'name'    =>    '写真',
            'type'    =>    [VAR_TYPE_FILE],
            'form_type'   =>    FORM_TYPE_FILE, FORM_TYPE_SELECT,
            'custom'    =>    'checkFileSize',
        ],
    ];
    /**
     *  ファイル拡張子のバリデーション
     *
     *  @access public
     *  @param array $picture_array
     */
    public function checkFileSize($pictureArray)
    {
        foreach ($this->form_vars[$pictureArray] as $picture) {
            if ($picture['size'] > 5000000) {
                $this->ae->add($pictureArray, 'ファイルサイズが大き過ぎます。', E_FORM_INVALIDVALUE);
            }
        }
    }

}

/**
 *  edit action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Edit extends Sharepictures_ActionClass
{
    /**
     *  preprocess of edit Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->session->get('edit') === null) {
            //  この時点で、存在しないイベントのURLが投げられている事が発覚したら、一覧画面に返される
            $eventArray = $this->session->get('show');
            $eventId = array_search($this->af->get('eventno'), array_column($eventArray, 'id'));
            if (!$eventId) {
                return 'show';
            }
            //   存在するイベントのURLならば、初期化処理に入る
            $this->session->set('edit', $eventArray[$eventId]);
            $this->session->start('edit');
            return null;
        } else {
            //  セッションが始まっている時は、未入力ありまたは更新処理であると考えられる
            if ($this->af->validate() > 0) {
              //  だから未入力項目があれば、エラーを表示する
                return 'edit';
            }
            //  ここまで通ったということは更新処理である
            echo '<pre>';
              var_dump($this->session->get('edit'));
                          echo '</pre>';
            if ($this->session->get('edit')['title'] !== $this->af->get('title')) {

            }
        }


        return null;
    }

    /**
     *  edit action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'edit';
    }

    /**
     *  セッション切れの確認
     *
     *  @access public
     *  @return string  編集画面
     */
    public function authenticate()
    {
        if (!$this->session->isStart('login')) {
            return 'login';
        }

        if (!$this->session->isStart('show')) {
            return 'show';
        }
    }
}
