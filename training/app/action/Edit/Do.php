<?php
/**
 *  Edit/Do.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  edit_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_EditDo extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
       /*
        *  TODO: Write form definition which this action uses.
        *  @see http://ethna.jp/ethna-document-dev_guide-form.html
        *
        *  Example(You can omit all elements except for "type" one) :
        *
        *  'sample' => array(
        *      // Form definition
        *      'type'        => VAR_TYPE_INT,    // Input type
        *      'form_type'   => FORM_TYPE_TEXT,  // Form type
        *      'name'        => 'Sample',        // Display name
        *
        *      //  Validator (executes Validator by written order.)
        *      'required'    => true,            // Required Option(true/false)
        *      'min'         => null,            // Minimum value
        *      'max'         => null,            // Maximum value
        *      'regexp'      => null,            // String by Regexp
        *
        *      //  Filter
        *      'filter'      => 'sample',        // Optional Input filter to convert input
        *      'custom'      => null,            // Optional method name which
        *                                        // is defined in this(parent) class.
        *  ),
        */
    );

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
 *  edit_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_EditDo extends Sharepictures_ActionClass
{
    /**
     *  preprocess of edit_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
          // forward to error view (this is sample)
            return 'edit';
          }
        return null;
    }

    /**
     *  edit_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
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
        return 'edit';
    }
}
