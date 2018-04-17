<?php
/**
 *  Show.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  show view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_Show extends Sharepictures_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $this->af->setApp('event_array', $this->session->get('edit'));
    }
}
