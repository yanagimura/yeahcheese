<?php
/**
 *  Edit.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  edit view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_Edit extends Sharepictures_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $this->af->setApp('title', $this->session->get('edit')['title']);
        $this->af->setApp('release_date', $this->session->get('edit')['release_date']);
        $this->af->setApp('end_date', $this->session->get('edit')['end_date']);
        $this->af->setApp('authentication_key', $this->session->get('edit')['authentication_key']);
    }
}
