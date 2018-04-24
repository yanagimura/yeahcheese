<?php
/**
 *  Create.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  create view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_Create extends Sharepictures_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        if(! is_null($this->session->get('create'))) {
          $this->af->form['title']['default'] = $this->session->get('create')['title'];
          $this->af->form['release_date']['default'] = $this->session->get('create')['release_date'];
          $this->af->form['end_date']['default'] = $this->session->get('create')['end_date'];
        }
    }
}
