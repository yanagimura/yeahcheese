<?php
// vim: foldmethod=marker
/**
 *  Sharepictures_ViewClass.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

// {{{ Sharepictures_ViewClass
/**
 *  View class.
 *
 *  @author     {$author}
 *  @package    Sharepictures
 *  @access     public
 */
class Sharepictures_ViewClass extends Ethna_ViewClass
{
    /**#@+
     *  @access protected
     */

    /** @var  string  set layout template file   */
    protected $_layout_file = 'layout';

    /**#@+
     *  @access public
     */

    /** @var boolean  layout template use flag   */
    public $use_layout = true;

    /**
     *  set common default value.
     *
     *  @access protected
     *  @param  object  Sharepictures_Renderer  Renderer object.
     */
    protected function _setDefault($renderer)
    {
    }

}
// }}}

