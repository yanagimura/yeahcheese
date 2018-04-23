<?php
/**
 *  Viewer/View.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  viewer_view view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_ViewerView extends Sharepictures_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $this->af->setApp('picture_array', $this->session->get('view'));
    }
}
