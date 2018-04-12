<?php
/**
 *  Home.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  home view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_View_Home extends Sharepictures_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
      $mailaddress = $this->session->get('login')['mailaddress'];
      $this->af->setApp('username', $mailaddress);
    }
}
