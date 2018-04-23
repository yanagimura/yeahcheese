<?php
/**
 *  Create/Do.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */
/**
 *  create_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */

class Sharepictures_Form_CreateDo extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    const MIN_LENGTH = 3;
    const MAX_LENGTH = 20;
    public $form = [
          'title'       => [
            //  イベント名フォームの定義
              'name'            =>    'タイトル',
              'type'            =>    VAR_TYPE_STRING,
              'required'        =>    true,
              'min'             =>    self::MIN_LENGTH,
              'max'             =>    self::MAX_LENGTH,
          ],
          'release_date' => [
            //  公開開始日フォームの定義
              'name'            =>    '公開開始日',
              'type'            =>    VAR_TYPE_DATETIME,
              'required'        =>    true,
          ],
          'end_date'     => [
            //  公開終了日フォームの定義
              'name'            =>    '公開終了日',
              'type'            =>    VAR_TYPE_DATETIME,
              'required'        =>    true,
              'custom'          =>    'checkDateInterval',
          ],
          'picture_array' => [
            //  写真アップロードフォームの定義
              'name'            =>    '写真',
              'type'            =>    [VAR_TYPE_FILE],
              'required'        =>    true,
              'custom'          =>    'checkFile',
          ],
    ];

    /**
     *  公開日数のバリデーション
     *
     *  @access public
     *  @param string $end_date
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
     *  ファイル拡張子のバリデーション
     *
     *  @access public
     *  @param array $picture_array
     */
    public function checkFile($pictureArray)
    {
        if (is_null($this->form_vars[$pictureArray]) || $this->form_vars[$pictureArray][0]['name'] === "") {
            return;
        }

        foreach ($this->form_vars[$pictureArray] as $picture) {
            // .jpeg ,jpeg以外はエラー
            if (exif_imagetype($picture['tmp_name']) !== IMAGETYPE_JPEG) {
                $this->ae->add($pictureArray, 'ファイル形式に誤りがあります。', E_FORM_INVALIDVALUE);
                return;
            }
            if ($picture['size'] > 5000000) {
                $this->ae->add($pictureArray, 'ファイルサイズが大き過ぎます。', E_FORM_INVALIDVALUE);
                return;
            }
        }
    }
}

/**
 *  create_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_CreateDo extends Sharepictures_ActionClass
{
    /**
     *  preprocess of create_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'create';
        }
        return null;
    }

    /**
     *  画像ファイルとそのサムネイルを一時フォルダに保存後、とSession開始後、
     *  Confirm.tplを表示
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        //  画像ファイルを一時フォルダに保存
        $uploaddir = 'images/tmp/';
        $pictureArray = [];
        foreach ($this->af->get('picture_array') as $picture) {
            $uploadfile = $uploaddir . basename($picture['name']);
            move_uploaded_file($picture['tmp_name'], $uploadfile);
            $pictureArray[] = $uploadfile;
        }

        //  セッション開始
        $sessionarray = [
            'title'   =>    $this->af->get('title'),
            'release_date'    =>    $this->af->get('release_date'),
            'end_date'    =>    $this->af->get('end_date'),
            'picture_array'   =>    $pictureArray,
        ];

        $this->session->set('create', $sessionarray);
        $this->session->start('create');

        return 'confirm';
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
