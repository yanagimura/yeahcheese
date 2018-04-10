<?php
// vim: foldmethod=marker
/**
 *  Sharepictures_ActionForm.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

// {{{ Sharepictures_ActionForm
/**
 *  ActionForm class.
 *
 *  @author     {$author}
 *  @package    Sharepictures
 *  @access     public
 */
class Sharepictures_ActionForm extends Ethna_ActionForm
{
    /**#@+
     *  @access protected
     */

    /** @var    array   form definition (default) */
    public $form_template = array();

    /**#@-*/

    /**
     *  Error handling of form input validation.
     *
     *  @access public
     *  @param  string      $name   form item name.
     *  @param  int         $code   error code.
     */
    public function handleError($name, $code)
    {
        return parent::handleError($name, $code);
    }

    /**
     *  setter method for form template.
     *
     *  @access protected
     *  @param  array   $form_template  form template
     *  @return array   form template after setting.
     */
    protected function _setFormTemplate($form_template)
    {
        return parent::_setFormTemplate($form_template);
    }

    /**
     *  setter method for form definition.
     *
     *  @access protected
     */
    protected function _setFormDef()
    {
        return parent::_setFormDef();
    }

}
// }}}

