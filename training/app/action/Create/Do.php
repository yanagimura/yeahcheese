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
          ],
          'picture_array' => [
            //  写真アップロードフォームの定義
              'name' => '写真',
              'type' => array(VAR_TYPE_FILE),
              'required' => true,
          ],
    ];

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
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
     *  Session'create'を発行
     *  Confirm.tplを表示
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        echo('<pre>');
        var_dump($this->af->get('picture_array'));
        echo('</pre>');
        return 'confirm';
    }



}
