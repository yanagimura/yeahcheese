<?php
/**
 *  Upload.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  upload view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_Upload extends Sharepictures_ViewClass
{
    /**
     *  セッション'create'からデータを取得後、upload.tplに反映
     *
     *  @access public
     */
    public function preforward()
    {
        $this->af->setApp('authentication_key',$this->session->get('authSession')['authentication_key']);
        $this->af->setApp('title',$this->session->get('create')['title']);
        $this->af->setApp('release_date',$this->session->get('create')['release_date']);
        $this->af->setApp('end_date',$this->session->get('create')['end_date']);
        $this->af->setApp('count', count($this->session->get('create')['picture_array']));

    }
}
