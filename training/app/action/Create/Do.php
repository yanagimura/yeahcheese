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
    public $form = [
          'title' => [
            //  イベント名フォームの定義
              'name' => 'タイトル',
              'type' => VAR_TYPE_STRING,
              'required' => true,
              'min' => 3,
          ],
          'release_date' => [
            //  公開開始日フォームの定義
              'name' => '公開開始日',
              'type' => VAR_TYPE_DATETIME,
              'required' => true,
          ],
          'end_date' => [
            //  公開終了日フォームの定義
              'name' => '公開終了日',
              'type' => VAR_TYPE_DATETIME,
              'required' => true,
              'custom' => 'checkDateInterval',
          ],
          'picture_array' => [
            //  写真アップロードフォームの定義
              'name' => '写真',
              'type' => array(VAR_TYPE_FILE),
              'required' => true,
              'custom' => 'checkFile',
          ],
    ];
    /**
     *  公開日数のバリデーション
     *
     *  @access public
     *  @param string $end_date
     */
    public function checkDateInterval($end_date)
    {
        $ed = strtotime($this->form_vars[$end_date]);
        $rd = strtotime($this->form_vars['release_date']);
        $interval = ($ed - $rd) / (60 * 60 * 24);

        if ($interval < 0) {
            $this->ae->add($end_date, '公開開始日より後の日付を選択してください', E_FORM_INVALIDVALUE);
        }
    }
    /**
     *  ファイル拡張子のバリデーション
     *
     *  @access public
     *  @param array $picture_array
     */
    public function checkFile($picture_array)
    {
        foreach ($this->form_vars[$picture_array] as $picture) {
            // .jpeg ,jpeg以外はエラー
            if (!strpos($picture['type'],'jpeg') && !strpos($picture['type'],'jpg')) {
                $this->ae->add($picture_array, 'ファイル形式に誤りがあります。', E_FORM_INVALIDVALUE);
              }
            if ($picture['size'] >= 5000000) {
                $this->ae->add($picture_array, 'ファイルサイズが大き過ぎます。', E_FORM_INVALIDVALUE);
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
     *  データのバリデーションとSession開始後、
     *  Confirm.tplを表示
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $sessionarray = [
            'title'   =>    $this->af->get('title'),
            'release_date'    =>    $this->af->get('release_date'),
            'end_date'    =>    $this->af->get('end_date'),
            'picture_array'   =>    $this->af->get('picture_array'),
        ];

        $this->session->set('create', $sessionarray);
        $this->session->start();

        return 'confirm';
    }


}
