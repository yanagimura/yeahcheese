<?php
/**
 *  Confirm.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  confirm view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_Confirm extends Sharepictures_ViewClass
{
    /**
     *  Session名'create'からデータを取得
     *  confirm.tplにデータを反映
     *  @access public
     */
    public function preforward()
    {
        $this->af->setApp('title',$this->session->get('create')['title']);
        $this->af->setApp('release_date',$this->session->get('create')['release_date']);
        $this->af->setApp('end_date',$this->session->get('create')['end_date']);
        $this->af->setApp('count',count($this->session->get('create')['picture_array']));

        //smarty用にURLを設定する
        $urlArray = [];
        foreach ($this->session->get('create')['picture_array'] as $picture) {
            $urlArray[] = $picture['tmp_name'];
        }

        $this->af->setApp('urlArray', $urlArray);
        echo('<pre>');
        var_dump($urlArray);
        echo('</pre>');
    }
}
