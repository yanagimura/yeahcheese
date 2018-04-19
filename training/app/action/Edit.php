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
            'custom'    =>    'checkDateInterval',
        ],
        'new_picture_array'   =>    [
            'name'    =>    '写真',
            'type'    =>    [VAR_TYPE_FILE],
            'form_type'   =>    FORM_TYPE_FILE, FORM_TYPE_SELECT,
            'custom'    =>    'checkFileSize',
        ],
    ];
    /**
     *  公開日数のバリデーション
     *
     *  @access public
     *  @param string $endDate
     */
    public function checkDateInterval($endDate)
    {
        $eDate = new Datetime($this->form_vars[$endDate]);
        $rDate = new DateTime($this->form_vars['release_date']);
        if ($eDate < $rDate) {
            $this->ae->add($endDate, '公開開始日より後の日付を選択してください', E_FORM_INVALIDVALUE);
        }
    }
    /**
     *  ファイルサイズのバリデーション
     *
     *  @access public
     *  @param array $pictureArray
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
            return null;
        } else {
            //  セッションが始まっている時は、未入力ありまたは更新処理であると考えられる
            if ($this->af->validate() > 0) {
              //  だから未入力項目があれば、エラーを表示する
                return 'edit';
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

        if ($this->af->get('title') === null) {

            // 初期化処理
            $this->af->form['title']['default'] = $this->session->get('edit')['title'];
            $this->af->form['release_date']['default'] = $this->session->get('edit')['release_date'];
            $this->af->form['end_date']['default'] = $this->session->get('edit')['end_date'];
        } else {
            //  テーブル更新処理を行う
            $newEventArray = $this->session->get('edit');
            $db = $this->backend->getDB();

            if ($this->af->get('new_picture_array')[0]['name'] !== '') {
                foreach ($this->af->get('new_picture_array') as $picture) {
                    //  画像ファイルを保存
                    $uploadfile = 'images/tmp/' . basename($picture['name']);
                    move_uploaded_file($picture['tmp_name'], $uploadfile);
                    $sql = "INSERT INTO pictures(filename, event_id) VALUES($1, $2)";
                    $db->query($sql, [$uploadfile, $newEventArray['id']]);
                    //  セッションにも追加情報を反映

                    $sql = "SELECT * FROM pictures ORDER BY id DESC LIMIT 1";
                    array_push($newEventArray['picture_array'], [
                    'id'    =>    $db->getRow($sql)['id'],
                    'filename'    =>    $db->getRow($sql)['filename'],
                    'event_id'    =>    $db->getRow($sql)['event_id'],
                    ]);
                }
            } else {
            //  チェックされた写真の削除処理を行う
                if (isset($_POST['delete'])) {
                    if (isset($_POST['picture']) && is_array($_POST['picture'])) {
                        foreach ($_POST['picture'] as $pictureId) {
                            $sql = "DELETE FROM pictures WHERE id = $1";
                            $db->query($sql, $pictureId);
                            $deleteId = array_search($pictureId, array_column($newEventArray['picture_array'], 'id'));
                            echo '<pre>';
                            var_dump($pictureId);
                            var_dump($deleteId);
                              echo '</pre>';
                            unset($newEventArray['picture_array'][$deleteId]);
                        }
                    }
                }
            }
            //  タイトル、日付をそれぞれ更新する
            if ($newEventArray['title'] !== $this->af->get('title')) {
                $sql = "UPDATE events SET title = $1 WHERE title = $2 AND id = $3 AND user_id = $4 ";
                $db->query($sql, [$this->af->get('title'), $newEventArray['title'], $newEventArray['id'], $this->session->get('login')['id']]);
                $newEventArray['title'] = $this->af->get('title');
            }
            if ($newEventArray['release_date'] !== $this->af->get('release_date')) {
                $sql = "UPDATE events SET release_date = $1 WHERE title = $2 AND id = $3 AND user_id = $4 ";
                $db->query($sql, [$this->af->get('release_date'), $newEventArray['title'], $newEventArray['id'], $this->session->get('login')['id']]);
                $newEventArray['release_date'] = $this->af->get('release_date');
            }
            if ($newEventArray['end_date'] !== $this->af->get('end_date')) {
                $sql = "UPDATE events SET end_date = $1 WHERE title = $2 AND id = $3 AND user_id = $4 ";
                $db->query($sql, [$this->af->get('end_date'), $newEventArray['title'], $newEventArray['id'], $this->session->get('login')['id']]);
                $newEventArray['end_date'] = $this->af->get('end_date');
            }

            $this->session->set('edit', $newEventArray);
        }
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
