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
        $this->af->form['title']['default'] = $this->session->get('edit')['title'];
        $this->af->form['release_date']['default'] = $this->session->get('edit')['release_date'];
        $this->af->form['end_date']['default'] = $this->session->get('edit')['end_date'];
        $this->af->setApp('authentication_key', $this->session->get('edit')['authentication_key']);
        $this->af->setApp('picture_array', $this->session->get('edit')['picture_array']);

    }
}
